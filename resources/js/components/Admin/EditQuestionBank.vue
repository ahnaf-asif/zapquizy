<template>
	<v-app >
		<ckeditor :config="{
			extraPlugins: 'eqneditor'
		}"></ckeditor>
		<div class="py-3">
			<h1 class="text-center font-bold my-3 text-3xl">{{ name }}</h1>
			<div class="form flex flex-row justify-center ">
				<div class="inside md:w-2/3 w-full">
					<v-form ref="form" class="border p-3">
				    <v-text-field v-model="name" label="Name" required ></v-text-field> 
						<v-select v-model="level" :items="levels" item-text="name" item-value="name" label="Level" required ></v-select>
				    <v-select v-model="subject" :items="subjects" item-text="name" item-value="name" label="Subject" required ></v-select>
				    <div class="text-center">
				    	<v-btn :color="saveBtnClr" class="text-white" @click="saveQuestionBankDetails()" >
						      {{ saveBtnText }}
					    </v-btn>
				    </div>
	  			</v-form>
				</div>
			</div>
			<div class=" flex flex-row justify-center ">
				<div class="inside border my-5 p-3 md:w-2/3 w-full">
					<v-text-field v-model="newChapter" label="New Chapter Name" required ></v-text-field>
					<v-btn class="w-full" outlined color="teal" @click="addChapter()" > Add Chapter </v-btn>
				</div>
			</div>

			<QuestionBankChapter v-for="(chapter, index) in chapters" :key="index" :chapter="chapter" :question-bank-id="questionBank.id" v-on:remove-chapter="removeChapter" />
		</div>
	</v-app>
</template>

<script>

import QuestionBankChapter from './QuestionBankChapter';

export default {

  name: 'EditQuestionBank',

  props: ['propQuestionBank', 'propSubjects', 'propLevels', 'propChapters'],

  components: {
  	 QuestionBankChapter
  },

  data () {
    return {
    	questionBank: null,
    	
    	subjects: null,
    	levels: null,
    	chapters: null,
	    
	    name: '',
	    level: '',
	    subject: '',

	    saveBtnClr: 'success',
	    saveBtnText: 'Save',

	    newChapter: '',

    }
  },
  created(){
  	this.questionBank = JSON.parse(this.propQuestionBank);
  	this.name = this.questionBank.name;
  	this.subject = this.questionBank.subject;
  	this.level = this.questionBank.level;

  	this.levels = JSON.parse(this.propLevels);
  	this.subjects = JSON.parse(this.propSubjects);
  	this.chapters = JSON.parse(this.propChapters);
  },
  methods: {
  	async saveQuestionBankDetails(){
  		this.questionBank.name = this.name;
  		this.questionBank.subject = this.subject;
  		this.questionBank.level = this.level;
  		try{
  			const resp = await axios.post('/admin/question-bank/save', JSON.stringify(this.questionBank));

  			if(resp.status === 200){
  				this.saveBtnClr = 'teal';
	  			this.saveBtnText = 'Saved';
	  			setTimeout(()=>{ 
	  				this.saveBtnClr = 'success';
	  				this.saveBtnText = 'Save';
	  			}, 2000);
  			}

  		}catch(err){
  			console.log(err);
  		}
  	},
  	async addChapter(){
  		let data = {
  			name: this.newChapter
  		}
  		try{
  			// console.log(JSON.stringify(data));
  			const resp = await axios.post(`/admin/question-bank/${this.questionBank.id}/add/chapter`, JSON.stringify(data));
  			console.log(resp);
				if(resp.status === 200){
					this.chapters = resp.data;
				}
  		}catch(err){
  			console.log(err);
  		}
  	},
  	async removeChapter(chapterId){
  		const resp = await axios.post(`/admin/question-bank/${this.questionBank.id}/remove/chapter/${chapterId}`);
  		this.chapters = resp.data;
  	}
  }
}
</script>

<style lang="scss" scoped>


</style>