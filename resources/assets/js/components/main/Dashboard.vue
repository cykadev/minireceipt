<template>
<div>
<section role="main" class="content-body">
<header class="page-header">
	<h2>{{title}}</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Layouts</span></li>
			<li><span>Light Sidebar</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>
</section>
</div>
</template>
<script>
  export default {
    // Do not forget this little guy
    name: 'Dashboard',
    title: '',
    computed: {
    	title(){
    		return this.title = 'Dashboard'
    	}
    },
    // when component uses other components
    components: {},
    methods: {},
    // component Lifecycle hooks
    beforeCreate() {

    },
    mounted() {
    	
    },
};
</script>
<style scoped>
	
</style>