<template>
    <div class="container">

        <div class="header">
            <h1>Stuck between 2 choices, let us Nudge Your Donkey</h1>
        </div>

        <div class="section scene">
            <div class="bucket grain"></div>
            <div class="donkey" :class="location"></div>
            <div class="bucket water"></div>
        </div>

        <div class="section inputs">
            <div @click="editOption1 = true">
                <input placeholder="Option 1" v-model="option1">
            </div>

            <div v-if="location == 'center'">
                <button @click="check" class="button">Nudge My Donkey</button>
            </div>
            <div v-else>
                <button @click="reset" class="button">Reset</button>
            </div>

            <div @click="editOption2 = true">
                <input placeholder="Option 2" v-model="option2">
            </div>
        </div>

        <div transition="fade" v-if="errors" class="section error">
            <h3>{{ errors }}</h3>
        </div>

        <div class="section signoff">
            <div class="mention laracon">
                <div class="logo"></div>
                <h3>Inspired by <a target="_blank" href="http://jackmcdade.com">Jack McDade's</a> talk at <a target="_blank" href="http://laracon.us">Laracon US 2016</a> on <a target="_blank" href="https://speakerdeck.com/jackmcdade/wizards-lawnmowers-and-hovercrafts">Wizards, Lawnmowers, and Hovercrafts</a> where he addresses <a target="_blank" href="https://en.wikipedia.org/wiki/Buridan%27s_ass">Buridan's ass</a>.</h3>
            </div>
            <div class="mention spinen">
                <div class="logo"></div>
                <h3>Hacked together by the guys at <a target="_blank" href="http://spinen.com">SPINEN</a> on <a target="_blank" href="https://laravel.com">Laravel 5.3</a> with <a href="https://vuejs.org">vue.js</a></h3>
            </div>

        </div>

        <div class="section forkme">
            <a href="https://github.com/spinen/nudgemydonkey.com" target="_blank">Fork Me on Github</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                option1:     '',
                option2:     '',
                location:    'center',
                showResult:  false,
                editOption1: false,
                editOption2: false,
                errors:      false
            }
        },
        methods: {
            check() {
                if (this.option1 && this.option2) {
                    return this.nudge();
                }

                this.errors = "Please enter options.";
                setTimeout(function () {
                    console.log(this)
;                }, 1);
            },
            nudge() {
                this.errors = false;

                if (Math.round(Math.random())) {
                    return this.location = 'left'
                }

                return this.location = 'right'
            },
            reset() {
                this.option1 = '';
                this.option2 = '';
                this.location = 'center';
                this.errors = false;
            }
        }
    }
</script>
