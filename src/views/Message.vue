<template>





	<div class="container">
		<div class="row">
			<div class="col">
				<div class="text-center">
						<div style="color: black;margin-top: 200px" class="home_title">{{message}}</div>						
				</div>
			</div>
		</div>
	</div>





</template>

<script>
export default {
    data() {
		return {
            message: '',
		}
	},   
    mounted() {
        this.message = localStorage.getItem('message')
        var timeleft = 3;
        var downloadTimer = setInterval(() => {
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            this.$router.push('/courses')
        }
        timeleft -= 1;
        }, 1000);
	},

}
</script>

<style scoped>
</style>



