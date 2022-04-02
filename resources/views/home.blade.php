@extends('layouts.app')

@section('content')
<div class="home bg-white">
    <div class="header">
        <div class="container md:flex md:flex-row md:items-center home-banner" >
            <div class="left md:w-1/2">
                <div class="inside py-5">
                    <h1 class=" md:text-6xl text-3xl">
                        Zap the Quizzes with <span class="text-custom-blue font-bold">ZapQuizy</span>
                    </h1>
                    <p class="mt-4 md:text-lg">Be a part of our huge community and start your personalized learning journey!</p>
                    <div class="buttons mt-4 text-center">
                        <div class="wrapper md:text-left">
                            <a href="#">
                                <button class="py-2 w-64 mt-3 text-center bg-custom-blue text-white md:text-lg hover:bg-blue-500">
                                    Make a Quiz
                                </button>
                            </a>
                            <a href="#">
                                <button  class="md:ml-2 py-2 mt-3 w-64 bg-custom-blue text-center text-white md:text-lg hover:bg-blue-500"> 
                                    Prepare for Exams
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right bg-green-600">
                <img src="/images/front-home.jpg" style="width: 450px;">
            </div>
        </div>
    </div>
    <div class="model-tests mt-3 md:mt-5">
        <div class="header flex justify-center">
            <h1 class="md:text-3xl text-xl text-center font-bold" style="width: 25ch;">Prepare for <span class="text-blue-500">Board Exams</span> with personalized Model Tests</h1>
            
        </div>
        <div class="container model-test-classes md:flex md:flex-row md:justify-center md:flex-wrap" style="column-gap: 20px;">
            <div class="ssc ">
                <v-card class="mx-auto mt-3" max-width="350">
                
                    <v-img  height="180" src="/images/ssc-chemistry.jpg"></v-img>
        
                    <v-card-title>SSC Preparation</v-card-title>
                    <v-card-text >
                        <ul>
                            <li><i class="fa fa-check"></i> 20 full Model Tests</li>
                            <li><i class="fa fa-check"></i> Solution Details</li>
                            <li><i class="fa fa-check"></i> Answer Analysis</li>
                        </ul>
                    </v-card-text>
                    <a href="#">
                        <button class="w-full py-3 text-custom-blue border-t-2 border-custom-blue text-lg">
                            Show More
                        </button>
                    </a>
                </v-card>
            </div>
            <div class="hsc">
                <v-card class="mx-auto mt-3" max-width="350">
                
                    <v-img  height="180" src="/images/hsc-botany.jpg"></v-img>
        
                    <v-card-title>HSC Preparation</v-card-title>
                    <v-card-text>
                        <ul>
                            <li><i class="fa fa-check"></i> 20 full Model Tests</li>
                            <li><i class="fa fa-check"></i> Solution Details</li>
                            <li><i class="fa fa-check"></i> Answer Analysis</li>
                        </ul>
                    </v-card-text>
                    <a href="#">
                        <button class="w-full py-3 bg-custom-blue hover:bg-blue-500 text-white text-lg">
                            Show More
                        </button>
                    </a>
                </v-card>
            </div>
            <div class="hsc">
                <v-card class="mx-auto mt-3" max-width="350">
                
                    <v-img  height="150" src="/images/demo.jpg"></v-img>
        
                    <v-card-title>BCS Preparation</v-card-title>
                    <v-card-text>
                        <ul>
                            <li><i class="fa fa-check"></i> 20 full Model Tests</li>
                            <li><i class="fa fa-check"></i> Solution Details</li>
                            <li><i class="fa fa-check"></i> Answer Analysis</li>
                        </ul>
                    </v-card-text>
                    <a href="#">
                        <button class="w-full py-3 bg-custom-blue hover:bg-blue-500 text-white text-lg">
                            Show More
                        </button>
                    </a>
                </v-card>
            </div>
            <div class="hsc">
                <v-card class="mx-auto mt-3" max-width="350">
                
                    <v-img  height="150" src="/images/demo.jpg"></v-img>
        
                    <v-card-title>HSC Preparation</v-card-title>
                    <v-card-text>
                        <ul>
                            <li><i class="fa fa-check"></i> 20 full Model Tests</li>
                            <li><i class="fa fa-check"></i> Solution Details</li>
                            <li><i class="fa fa-check"></i> Answer Analysis</li>
                        </ul>
                    </v-card-text>
                    <a href="#">
                        <button class="w-full py-3 bg-custom-blue hover:bg-blue-500 text-white text-lg">
                            Show More
                        </button>
                    </a>
                </v-card>
            </div>
        </div>
    </div>
</div>

@endsection
