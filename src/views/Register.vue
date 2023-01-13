<template>
    <div>
        <Header />



        


            <!-- Contact -->

            <div class="contact">

            </div>





        <Footer />
    </div>
</template>
<script>
import Footer from '@/components/Footer.vue'
import Header from '@/components/Header.vue'

export default {
    name: 'register',
    components: {
        Footer,
        Header
    },

    data() {
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirm: '',        
        }
    },

    mounted() {
    },
    methods: {    
        
    },
    computed: {
               
    },

}
</script>

<style scoped>
</style>