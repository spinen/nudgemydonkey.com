<template>
    <div class="container">

        <div class="header">
            <h1>Stuck between 2 choices, let us Nudge Your Donkey</h1>
        </div>
        
        <div class="section scene">
            <div class="bucket grain"></div>
            <div class="donkey center"></div>
            <div class="bucket water"></div>
        </div>

        <div class="section inputs">
            <div @click="editOption1 = true" v-on-clickaway="editOption1 = false">
                <input  placeholder="Option 1" v-model="option1">
            </div>
   
            <div v-if="!selectedOption">
                <button @click="check" class="button">Nudge My Donkey</button>
            </div>
            <div v-if="selectedOption">
                <button @click="showResultModal" class="button">Nudge My Donkey</button>
            </div>

            <div @click="editOption2 = true" v-on-clickaway="editOption2 = false">
                <input placeholder="Option 2" v-model="option2">
            </div>
        </div>

        <div class="section error">
            <h3>There was an error lorem ipsum dolor sit amet</h3>
        </div>

        <div class="section signoff">
            <div class="mention laracon">
                <div class="logo"></div>
                <h3>Inspired by <a target="_blank" href="http://jackmcdade.com">Jack McDade's</a> talk at <a target="_blank" href="http://laracon.us">Laracon US 2016</a> on Wizards, Lawnmowers, and Hovercrafts where he addresses <a target="_blank" href="https://en.wikipedia.org/wiki/Buridan%27s_ass">Buridan's ass</a>. </h3>
            </div>
            <div class="mention spinen">
                <div class="logo"></div>
                <h3>Hacked together by the guys at <a target="_blank" href="http://spinen.com">SPINEN</a> on <a target="_blank" href="https://laravel.com">Laravel 5.3</a> with <a href="https://vuejs.org">vue.js 2.0</a></h3>
            </div>

        </div>

        <div class="section forkme">
            <a href="https://github.com/spinen/nudgemydonkey.com" target="_blank">Fork Me on Github</a>
        </div>

        <modal :show.sync="showResult" title="You've Been Nudged!" :callback="reset" ok-text="Reset">
            <div class="container" slot="modal-body">
                <img src="https://i.imgur.com/lLzsy9t.jpg" class="img-thumbnail">
                <h2>{{ selectedOption }}</h2>
            </div>
        </modal>
    </div>
</template>

<script>
    import modal from './Modal.vue'
    import { mixin as clickaway } from 'vue-clickaway';
    export default {
        data() {
            return {
                option1: '',
                option2: '',
                selectedOption: '',
                showResult: false,
                editOption1: false,
                editOption2: false
            }    
        },
        mixins: [ clickaway ],
        components: {
            modal    
        },
        methods: {
            check() {
                if( this.option1 && this.option2 )
                {
                    return this.nudge();    
                }

                return alert('add options')
            },
            nudge() {
                
                let result = Math.random();        
                this.showResultModal();
                if(Math.round(result))
                {
                   return this.selectedOption = this.option1;
                }

                return this.selectedOption = this.option2
            },
            showResultModal() {
                return this.showResult = true;
            },
            reset() {
                this.option1 = '';    
                this.option2 = '';    
                this.selectedOption = '';    
                this.showResult = false;
            }
        }
    }
</script>
