<template>
    <div class="main_div">
        <h1>Creative SignUp Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="/register/store" method="post">
                    <input type="hidden" name="_token" :value="csrf">
                    <input class="text" type="text" name="username" placeholder="Username" required="required">
                    <input class="text email" type="email" name="email" placeholder="Email" required="required">
                    <input class="text" type="password" name="password" placeholder="Password" required="required">
                    <input class="text w3lpass" type="password" name="password_confirmation" placeholder="Confirm Password" required="required">
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
</style>
<script>
    export default {
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    }
</script>