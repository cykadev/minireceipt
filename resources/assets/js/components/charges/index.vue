<template>
<div>
<section role="main" class="content-body">
<notifications group="success" />
<header class="page-header">
	<h2>{{title}}</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Charges</span></li>
			<li><span>Charges List</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>
<section class="panel">
<section class="panel" :class="(active == 1) ? 'panel-collapsed' : ''">
					
								<header class="panel-heading">
										<button type="button" class="mb-xs mt-xs mr-xs btn btn-secondary btn-lg btn-block" @click="activate()"><i class="fa fa-plus"></i>
										Make New Charge</button>
									</header>
									<div class="panel-body">
									<form class="form-horizontal" @submit.prevent="addCharges">

									<div class="form-group" :class="{'has-error': errors.has('Category') }">
												<div class="col-md-12">
													<div class="input-group">
														<span class="input-group-addon btn-primary">Category</span>
													<select v-validate="'required'" name="Category" class="form-control" v-model="Category">
												<option value="1">Membership</option>
												<option value="2">Recommendation</option>
												<option value="3">Miscellaneous</option>
													</select>
													</div>
									<span class="customError">{{ errors.first('Category') }}</span>
												</div>
											</div>



											<div class="form-group" :class="{'has-error': errors.has('Title') }">
												<div class="col-md-12">
													<div class="input-group">
														<span class="input-group-addon btn-primary">Name</span>
														<input v-validate="'required|min:3|uniques'" type="text" name="Title" class="form-control" placeholder="Charges Title" v-model="Title">
													</div>

												<span class="customError">{{ errors.first('Title') }}</span>
												</div>
											</div>

												<div class="form-group" :class="{'has-error': errors.has('Price') }">
												<div class="col-md-12">
													<div class="input-group">
														<span class="input-group-addon btn-primary">Annual Fee</span>
														<input v-validate="'required|numeric'" type="text" name="Price" class="form-control" placeholder="Price" v-model="Price">
													</div>
									<span class="customError">{{ errors.first('Price') }}</span>
												</div>
											</div>

									<div class="form-group">
									<div class="col-md-12">
											<label class="col-md-2 control-label">Admission Fee? </label>
											<div class="col-md-10">
												<div class="radio-custom radio-inline radio-primary">
													<input name="Admission" type="radio" required="" aria-required="true" @click="toggle('yes')" :checked="(makeChecked == 1) ? 'checked' : '' ">
													<label for="Yes">Yes</label>
												</div>
												<div class="radio-custom radio-inline radio-primary">
													<input name="Admission" type="radio" @click="toggle('no')" :checked="(makeChecked == 0) ? 'checked' : '' ">
													<label for="No">No</label>
												</div>
												<label class="error" for="porto_is"></label>
											</div>
											</div>
										</div>

								<div class="form-group" :class="{'has-error': errors.has('Admission'), 'checked': makeChecked == 0  }">
									<div class="col-md-12">
										<div class="input-group">
										<span class="input-group-addon btn-primary">Admission Fee</span>
										<input v-validate="'numeric'" type="text" name="Admission" class="form-control" v-model="Admission" placeholder="Price">
										</div>
									<span class="customError">{{ errors.first('Admission') }}</span>
									</div>
								</div>

											<div class="form-group">
												<div class="col-md-12">
													<div class="input-group pull-right">
												<button class="btn btn-primary" @click="addCharges" type="submit">Create <i class="" style="font-size:17px" :class="(loading == 1) ? 'fa fa-spinner fa-spin' : ''"></i></button>
													</div>
						
												</div>
											</div>
										</form>
									</div>
								</section>



<my-vuetable></my-vuetable>

</section>

</section>

						</div>
</template>
<script>
import { Validator } from 'vee-validate'
import axios from 'axios'

/*
	For Company Unique Name
*/
const isUnique = value => new Promise((resolve) => {
  setTimeout(() => {
  	axios.get('/charges/checkUniqueCompany/'+value).then(
  		function(res){
  	  	if (res.data == 0) {
			return resolve({
				valid: true
			})
		}else{

			 return resolve({
	        	valid: false,
	        	data: {
			        message: `${value} is already in use.`
			      }
	      	})		
		}
  			
  		})

  }, 200)
})

Validator.extend('uniques', {
  validate: isUnique,
  getMessage: (field, params, data) => data.message
})
/*
	For Company Unique Name
*/

  export default {
    // Do not forget this little guy
    name: 'NewCompany',
    title: '',
    active: '',
    loading: '',
        // collapse : this.$store.state.collapse,
    data(){
    	return {
			Title: '',
			Price: '',
			Category: '',
			Admission: '',
    	}
    },

    computed: {
		title(){
    		return this.title = 'Charges'
    	},
    	active(){
    		return this.active = this.$store.state.collapse
    	},
    	loading(){
    		return this.loading = this.$store.state.loading
    	},
    	makeChecked(){
			return this.$store.state.checkbox
    	}
    },
    // when component uses other components
    components: {},
    methods: {
    	toggle(data){
    		this.$store.dispatch('triggercheck', data)
    		return this.admission = ''
    	},
    	addCharges:function (e) {
    		e.preventDefault()
    		// Loader

	      this.$validator.validateAll().then((result) => {
	        if (result) {
    			this.$store.dispatch('initLoading');


		     	axios.post('/charges',{
		     			params:{
			     			title:this.Title,
			     			price:this.Price,
			     			category:this.Category,
			     			admission:this.Admission,
		     			}
		     		}
		     	).then(res => {
		     		this.$store.dispatch('initLoading');
	    			if (res.data.success === false) {
	    				    this.$notify({
								group: 'success',
								type: 'error',
								duration: 4000,
								title: 'Error',
								text: res.data.error,
							});
	    			}else{

	    				/*
							Truncate Form
	    				*/
	    					this.activate()
	    					this.Title = ''
							this.Price = ''
							this.Category = ''
							this.Admission = ''

	    				    this.$notify({
								group: 'success',
								type: 'success',
								title: 'Success',
								duration: 4000,
								text: 'Charges added successfully.'
							});

							this.$events.fire('filter-reset')
	    			}
	    		})
	        }
	      })

    	},
    	activate:function(){
    		this.$store.dispatch('collapseData')
    	},

    },
    // component Lifecycle hooks
    beforeCreate() {

    },
    mounted() {
    	
    },
};
</script>

<style scoped>

.checked{
	display: none;
}
	
</style>