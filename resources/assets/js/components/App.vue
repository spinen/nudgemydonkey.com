<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                  <h1 class="text-center">Nudge My Donkey</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4" @click="editOption1 = true" v-on-clickaway="editOption1 = false">
                <div class="panel panel-primary" >
                    <input  placeholder="Option 1" class="form-control" v-model="option1">
                </div>
            </div>
            <div class="col-lg-4 text-center">
                OR
            </div>
            <div class="col-lg-4" @click="editOption2 = true" v-on-clickaway="editOption2 = false">
                <div class="panel panel-primary">
                <input  placeholder="Option 2" class="form-control" v-model="option2">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div v-if="!selectedOption">
                    <button @click="check" class="btn btn-block btn-primary">Nudge My Donkey</button>
                </div>
                <div v-if="selectedOption">
                    <button @click="showResultModal" class="btn btn-block btn-primary">Nudge My Donkey</button>
                </div>
            </div>
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
