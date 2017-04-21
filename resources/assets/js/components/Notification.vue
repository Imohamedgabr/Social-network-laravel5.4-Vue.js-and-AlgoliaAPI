<template>
	<div>
		
	</div>
</template>

<script>
	export default {
 	   mounted() {
 	   		this.listen()

    	},
    	// we are going get the authenticated user using props
    	props: ['id'],
    	methods: {
    		listen(){
    			Echo.private('App.User.' + this.id)
    				.notification( (notification) => {
    					$.notify(notification.name + notification.message , "success");
                        document.getElementById("noty_audio").play()
    				})
                    
    		}
    	}
	}
</script>