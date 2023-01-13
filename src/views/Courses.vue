<template>
<div>


  
<Header />



   	<!-- Courses -->

	<div class="courses">
		<div class="container">



			<div class="row courses_row">
			

				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center"><h2>Choose your new course!</h2></div>
					<br>
				</div>

				<!-- Course -->


			</div>


		</div>
	</div>



<Footer />

</div>
</template>

<script>
import Footer from '@/components/Footer.vue'
import Header from '@/components/Header.vue'

export default {

    components: {
        Footer,
        Header
    },
  

    data() {
        return {
        courses: [],
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