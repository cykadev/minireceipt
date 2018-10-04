<template>
<div class="inner-wrapper">
	<!-- start: sidebar -->
	<aside id="sidebar-left" class="sidebar-left">
		
		<div class="sidebar-header">
			<div class="sidebar-title">
				Navigation
			</div>
			<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle" @click="sidebarCollapse()">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>

		<div class="nano">
			<div class="nano-content">
<div class="loader" v-if="navLoading"></div>
			<!-- Navbar Start -->
	<nav id="menu" class="nav-main" role="navigation">

			<!-- Navbar Loop Start Main -->
		<ul class="nav nav-main" v-for="navbar in navbars">

			<!-- if Navbar Has 0 Ancestors -->
			<template v-if="navbar.have_ancestor == 0">
			<router-link tag="li" :to="navbar.navigate_to" class="button" @click.native="activate(navbar.id)">

			<a><i :class="navbar.font"></i><span>{{navbar.navbar}}</span></a>
			</router-link>
			</template>
			<template v-else>

			<!-- if Navbar Has > 0 Ancestors -->
			<li @click="activate(navbar.id)" class="nav-parent" :class="active_el == navbar.id ? 'navexpanded' : ''" >
			<a href="javascript:void(0);">
			    <i :class="navbar.font" aria-hidden="true"></i>
			    <span>{{ navbar.navbar }}</span>
			</a>
			<!-- Loop Again for Navbar Ancestors -->
			<ul class="nav nav-children">
			<template v-for="ancestor in navbar.ancestors">
				<router-link tag="li" :to="ancestor.navigate_to">
				<a>{{ancestor.navbar}}</a>
				</router-link>
			</template>
			</ul>

			</li>
			</template>
		</ul>
		<!-- Navbar Loop End Main -->
	</nav>
	<!-- Navbar End -->
				
				<hr class="separator" />


			</div>
		</div>
		
	</aside>
</div>
<!-- end: sidebar -->
</template>


<script>
import axios from 'axios';







 export default {
  name: 'adminnavbar',

	  data () {
	  return {
	    navbars: [],
	    active_el:0,
	    navLoading: 0,
	   }
	},

	methods: {
	    activate:function(el){

	    	if (this.active_el == el) {
					this.active_el = 0;
	    	}else{
	    			this.active_el = el;
	    	}

	    },
	    sidebarCollapse: function(e) {

    				var x = document.getElementsByTagName("html")[0]
					if (x.classList.contains('sidebar-left-collapsed')) {
						x.classList.remove('sidebar-left-collapsed');
					}else{	
    					x.classList.add('sidebar-left-collapsed')
					}

		}

	},
	beforeCreate() {
    },
	mounted(){
		this.navLoading = 1
		setTimeout(() => {

		return axios.get('/navbar').then(res => {
	      if(res.data) {
	        this.navbars = res.data
	        this.navLoading = 0
	      }
	    }).catch(err => {
	      if(err) {
			this.navbars = res.data
			this.navLoading = 0
	      }
	    })

		}, 1000);
	}

}

</script>
<style scoped>
	
</style>