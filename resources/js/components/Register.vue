<template>
    <div class="main_div">
        <h1>Creative SignUp Form</h1>
        <div class="main-agileinfo">
            <b-alert variant="danger"
                     dismissible
                     fade
                     :show="showDismissibleAlert"
                     @dismissed="showDismissibleAlert=false">
                {{alertText}}
            </b-alert>
            <div class="agileits-top">
                <form action="/register/store" method="post" @submit.prevent="validateInputs()" ref="regForm">
                    <input type="hidden" name="_token" :value="csrf">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="text" type="text" id="username" name="username" v-model="usernameValue">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="text" type="email" id="email" name="email" v-model="emailValue">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="text" type="password" id="password" name="password" v-model="passwordValue">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="text" type="password" id="password_confirmation" name="password_confirmation" v-model="confirmPasswordValue">
                    </div>
                    <input type="submit" value="SIGNUP">
                </form>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
        </div>
    </div>
</template>
<style src="../../../public/css/registration.css"></style>
<style>
    .main_div{
        padding: 40px;
    }
    label{
        color: #FFFFFF;
    }
    #app{
        background: #b9bbbe;
    }
</style>
<script>
    export default {
        data(){
            return{
                dismissSecs: 10,
                dismissCountDown: 0,
                showDismissibleAlert: false,
                alertText: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                usernameValue: '',
                emailValue: '',
                passwordValue: '',
                confirmPasswordValue: ''
            }
        },
        methods: {
            validateInputs: function() {
                if(this.checkIfAllFieldsAreFilled()&&this.validateEmail()&&this.validatePassword()){
                    //this.$refs.regForm.submit();
                    $('form').submit();
                }
            },
            checkIfAllFieldsAreFilled:function() {
                if(!(this.usernameValue!==''&&this.emailValue!==''&&this.passwordValue!==''&&this.confirmPasswordValue!=='')){
                    console.log(this.usernameValue);
                    this.alertText='One or more fields are empty! Please try again!';
                    this.showDismissibleAlert=true;
                    return false;
                }
                return true;
            },
            validateEmail:function () {
                if(!this.emailValue.match(
                    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                    this.alertText='The Entered email is invalid! Please try again!';
                    this.showDismissibleAlert=true;
                    return false;
                }
                return true;
            },
            validatePassword:function() {
                if(this.passwordValue!==this.confirmPasswordValue){
                    this.alertText='The password doesn\'t match the confirmation! Please try again!';
                    this.showDismissibleAlert=true;
                    return false;
                }
                return true;
            }
        }
    }
</script>