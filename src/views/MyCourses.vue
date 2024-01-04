<template>
	<div>
		<Header />



			<div class="news">
				<div class="container">
					<div style="margin-top:200px;" class="row">

						<!-- News Posts -->
						<div class="col-lg-8">

						</div>


					</div>



				</div>
			</div>






		<Footer />
	</div>
</template>

<script>
import Footer from '@/components/Footer.vue'
import Header from '@/components/Header.vue'

import { useEnrollsStore } from '@/store/enrolls'


export default {
	setup() {
		const enrollsStore = useEnrollsStore()		
		return { enrollsStore }
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