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

import { useCoursesStore } from '@/store/courses'
import { useCategoriesStore } from '@/store/categories'

export default {
	setup() {
		const coursesStore = useCoursesStore()		
        const categoriesStore = useCategoriesStore()	
		return { coursesStore, categoriesStore }
    },
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