<template>

	<div class="questions">
		<!-- <quillEditor v-model="newQuestion" /> -->
		
		<div class="inside">
			<v-form ref="form" class=" border p-3"> 
				<h1 class="text-lg font-bold">Question:</h1>
				<quillEditor v-model="newQuestion"  />
				<div class="">
					<!-- <h1 class="text-lg font-bold">Options:</h1> -->
					<div class="option" v-for="(option,i) in newQuestionOptions" :key="i">
						<div class="wrapper mt-5"> 
							<h1 class="text-lg font-bold">Option {{ i+1 }}:</h1>
							<div class="option-inside">
								<quillEditor toolbar="minimal" v-model="newQuestionOptions[i].name"  />
									<!-- <v-text-field v-model="newQuestionOptions[i].name" :id="`option${i+1}`"required> </v-text-field> -->
									<div class="buttons">
										<v-btn v-if="!newQuestionOptions[i].correct" color="primary" class="w-full"  @click="toggleCorrectNewQuestion(i)">Mark as Correct</v-btn>
										<v-btn v-if="newQuestionOptions[i].correct" color="success" class="w-full"  @click="toggleCorrectNewQuestion(i)">correct</v-btn>
										<v-btn color="error"  @click="removeNewOption(i)" class="w-full mt-1" >remove Option</v-btn>
									</div>
							</div>
						</div> 
					</div>
				</div>
				<div class="actions mt-10">
					<v-btn class="w-full" outlined color="grey lighten-1" @click="addMoreOptionToNewQuestion()" > Add More Option </v-btn>
					<v-btn class="w-full mt-2 text-white"  :color="saveBtnClr" @click="saveNewQuestion()" >{{ saveBtnText }}</v-btn>

					<div v-if="err" class="text-red-600 font-bold text-sm">{{ errMsg }}</div>
				</div>
			</v-form> 
		</div>
	</div>

</template>

<script>

// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import 'quill/dist/quill.bubble.css';

import { quillEditor } from 'vue-quill-editor';

export default {

  name: 'AddNewQuestion',

  // components: [ckeditor: CKEditor.component],
  components: {
  	quillEditor
  },
  data () {
    return {
    	newQuestion: null,
	    newQuestionOptions: [{
	    	name: '',
  			correct: false,
  			demo: 'demo here',
	    }],
	    saveBtnClr: 'teal',
			saveBtnText: 'Save this Question',
			err: false,
			errMsg: '',
    }
  },
  methods: {
  	checkIfValidQuestion(){
  		this.err = false;
  		if(this.newQuestion === null || this.newQuestion === ''){
  			this.err = true;
  			this.errMsg = 'Question name can not be empty';
  			return false;
  		}
  		let atleastOneCorrect = false;
  		this.newQuestionOptions.forEach(option => {
  			if(option.name == "" || option.name == null){
  				this.errMsg = 'Options can not be empty';
  				this.err = true;
  				return false;
  			}
  			// console.log(option);
  			if(option.correct){
					atleastOneCorrect = true;
				}
  		});
  		if(!atleastOneCorrect){
  			this.errMsg = 'At least one option has to be correct';
  			this.err = true;
  			return false;
  		}
  		return true;
  	},
  	addMoreOptionToNewQuestion(){
  		// this.newQuestionOptions++;
  		let newQuestionOptionsMutation = this.newQuestionOptions;
  		newQuestionOptionsMutation.push({
  			name: '',
  			correct: false,
  			demo: 'demo here',
  		});
  		this.newQuestionOptions = newQuestionOptionsMutation;
  	},
  	saveNewQuestion(){
  			
  		if(!this.checkIfValidQuestion()){
  			return;
  		}

  		let mutatedQuestionOptions = this.newQuestionOptions;

  		const question = {
  			name: this.newQuestion,
  			options: mutatedQuestionOptions
  		};
  		this.$emit('submit-new-question', question);

			this.saveBtnText = 'Question Saved';

			setTimeout(()=>{
				this.saveBtnText = 'Save Question';
				this.newQuestion = null;
				this.newQuestionOptions = [{
					name: '',
	  			correct: false
				}];
			}, 2000);
  	},
  	toggleCorrectNewQuestion(i){
  		let newOption = this.newQuestionOptions[i];
  		if(newOption.correct){
  			newOption.correct = 0;
  		}
  		else {
  			newOption.correct = 1;
  		}
  		Vue.set(this.newQuestionOptions, i, newOption);
  	},
  	removeNewOption(i){
  		this.newQuestionOptions.splice(i,1);
  	}
  },
  created(){
  	
  }
}
</script>

<style lang="css" scoped>

</style>