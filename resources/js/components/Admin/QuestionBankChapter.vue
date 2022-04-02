<template>
	<div class="inside">
		<div class=" flex flex-row justify-center my-10 ">
			<div class="inside md:w-2/3 w-full">
				<div class="flex justify-between items-center">
					<h3 class="text-2xl my-3 font-bold text-gray-700">{{ chapter.name }}</h3>
					<v-btn color="error" small class=""  @click="removeChapter()">Remove Chapter</v-btn>
				</div>
				<hr>
				<div class="inside my-3">
					<v-expansion-panels>
						<v-expansion-panel> 
							<v-expansion-panel-header>
			        		<h1 class="font-bold text-lg text-purple-500"> + Add New Question</h1>
				        </v-expansion-panel-header>
				        <v-expansion-panel-content>
					        	<AddNewQuestion v-on:submit-new-question="submitNewQuestion" />
				        </v-expansion-panel-content>
						</v-expansion-panel>
						<v-expansion-panel> 
							<v-expansion-panel-header>
		        		<h1 class="font-bold text-lg"> + All Questions </h1>
			        </v-expansion-panel-header>
			        <v-expansion-panel-content>
					    	<div class="question" v-for="(question, index) in questions" :key="index">
					    		<div class="flex justify-between items-center">
										<div class="text-lg" v-html="question.name"></div>
										<v-btn color="error" small class=""  @click="removeQuestion(question.id)">Remove</v-btn>
									</div>
					    		<ul style="list-style: disc;">
					    		    <li v-for="option in question.options" :class="{'text-green-600':option.correct}">
					    		    	<div v-html="option.name"></div>
					    		    </li>
					    		</ul>
					    	</div>
			        </v-expansion-panel-content>
						</v-expansion-panel>
					</v-expansion-panels>
				</div>	
			</div>
		</div>
	</div>
</template>

<script>

import AddNewQuestion from '../renewable-components/AddNewQuestion';

export default {

  name: 'QuestionBankChapter',
  components: {
  	AddNewQuestion
  },
  props: ['chapter', 'questionBankId'],
  data () {
    return {
    	questions: [],
    }
  },
  methods: {
  	async submitNewQuestion(question){
  		// console.log(JSON.stringify(question));
		let resp = await axios.post(`/admin/question-bank/${this.questionBankId}/chapter/${this.chapter.id}/add/question`, JSON.stringify(question));
		this.questions = resp.data;
  	},
  	removeChapter(){
	  	if(confirm("do you really want this?")){
	  		this.$emit('remove-chapter', this.chapter.id);
	  	}
	  },
	  async removeQuestion(qid){
	  	if(confirm("Do you really want to remove Question?")){
	  		let resp = await axios.post(`/admin/question-bank/chapter/${this.chapter.id}/question/remove/${qid}`);
	  		this.questions = resp.data;
	  	}
	  }
  },
  async created(){
  	let resp = await axios.get(`/admin/question-bank/${this.questionBankId}/chapter/${this.chapter.id}/get/questions`);
		this.questions = resp.data;
		console.log(resp.data);
  },

}
</script>

<style lang="css" scoped>

</style>