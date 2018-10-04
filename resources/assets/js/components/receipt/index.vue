<template>
<div>
<template v-if="this.$store.state.printview == false">
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
			<li><span>Receipts</span></li>
			<li><span>Receipts List</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>

<div class="row" :class="(active == 1) ? 'panel-collapsed' : ''">
							<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
								<section class="panel form-wizard">
									<header class="panel-heading">

										<button type="button" class="mb-xs mt-xs mr-xs btn btn-secondary btn-lg btn-block" @click="activate()"><i class="fa fa-plus"></i>
										Make New Receipt</button>

									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li :class="(proceed == 0) ? 'active' : ''">
													<a href="javascipt:void(0)" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														Member
													</a>
												</li>
												<li :class="(proceed == 1) ? 'active' : ''">
													<a href="javascipt:void(0)" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Charges
													</a>
												</li>
												<li :class="(proceed == 2) ? 'active' : ''">
													<a href="javascipt:void(0)" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Confirm
													</a>
												</li>
											</ul>
										</div>
										<div class="form-horizontal">
											<div class="tab-content">
												<div class="tab-pane" :class="(proceed == 0) ? 'active' : ''">
													<div class="form-group" :class="{'has-error': errors.has('Member') }">
														<label class="col-sm-4 control-label" for="w1-username">Mr./Mrs./Miss</label>
														<div class="col-sm-8">
															<input type="text" v-validate="'required|min:3|alpha_spaces'" placeholder="Full name" class="form-control input-sm" name="Member" v-model="Member">
														<span class="customError">{{ errors.first('Member') }}</span>
														</div>
													</div>
													<div class="form-group" :class="{'has-error': errors.has('Messer') }">
														<label class="col-sm-4 control-label" for="w1-password">Messer's</label>
														<div class="col-sm-8">
															<input type="text" v-validate="'required|min:3|alpha_spaces'" class="form-control input-sm" name="Messer" v-model="Messer" placeholder="Messer's">
														<span class="customError">{{ errors.first('Messer') }}</span>
														</div>
													</div>

												</div>
												<div id="w1-profile" class="tab-pane" :class="(proceed == 1) ? 'active' : ''">
<div class="col-md-12">
<div class="form-group">
<div class="col-md-4">
<section class="panel panel-featured-left panel-featured-secondary">
<div class="panel-body">
	<div class="widget-summary">
		<div class="widget-summary-col widget-summary-col-icon">
			<div class="summary-icon bg-secondary">
				<i class="fa fa-usd"></i>
			</div>
		</div>
		<div class="widget-summary-col">
			<div class="summary">
				<h4 class="title">Expected Total</h4>
				<div class="info">
					<strong class="amount">PKR {{total}}</strong>
				</div>
			</div>
			<div class="summary-footer">
				<!-- <a class="text-muted text-uppercase">(withdraw all)</a> -->
			</div>
		</div>
	</div>
</div>
</section>
</div>

  <div class="col-md-8 custommargin">
  <multiselect 
  class="custompadding" 
  v-model="value" 
  :options="charges" 
  @select="totalPush" 
  @remove="removedItem" 
  :multiple="true" 
  :close-on-select="true" 
  :clear-on-select="true" 
  :hide-selected="true" 
  :preserve-search="true" 
  placeholder="Pick Charges" 
  label="title" 
  track-by="title" 
  :preselect-first="true" >

      <template slot="option" slot-scope="props"><h4>{{ props.option.title }}</h4>
      <div class="option__desc"><span class="option__title">{{ props.option.price }}</span><span class="option__small">
		<template v-if="props.option.category == 1">
      		{{ ' - Membership' }}	
		</template>
		<template v-if="props.option.category == 2">
      		{{ ' - Recommendation' }}	
		</template>
		<template v-if="props.option.category == 3">
      		{{ ' - Miscellaneous' }}	
		</template>

      </span></div>
    </template>
  </multiselect>
  </div>
</div>


<ul class="customUl">
  <li v-for="(v, index) in value">

  <span class="hvr-bounce-to-right">
	{{ v.title }}
  </span>

  <span v-show="(v.admission)" class="hvr-bounce-to-right">Admission fee do you want to add this too? 
<div class="switch switch-sm switch-success" @click="switchToggle(v.title)" :key="v.title"><div class="ios-switch customzIndex" :class="(activeToggle.includes(v.title)) ? 'on' : 'off'"><div class="on-background background-fill"></div><div class="state-background background-fill"></div><div class="handle"></div></div><input type="checkbox" name="switch" data-plugin-ios-switch="" checked="checked" style="display: none;"></div>
  </span>

  </li>
  </ul>

</div>
</div>

<div id="w1-confirm" class="tab-pane" :class="(proceed == 2) ? 'active' : ''">
	<div class="form-group">
	<div class="col-md-4">
<section class="panel panel-featured-left panel-featured-secondary">
<div class="panel-body">
	<div class="widget-summary">
		<div class="widget-summary-col widget-summary-col-icon">
			<div class="summary-icon bg-secondary">
				<i class="fa fa-usd"></i>
			</div>
		</div>
		<div class="widget-summary-col">
			<div class="summary">
				<h4 class="title">Expected Total</h4>
				<div class="info">
					<strong class="amount">PKR {{cf1vChanged}}</strong>
				</div>
			</div>
			<div class="summary-footer">
				<!-- <a class="text-muted text-uppercase">(withdraw all)</a> -->
			</div>
		</div>
	</div>
</div>
</section>
</div>
														<div class="col-md-8">
<section class="panel">
									<header class="panel-heading">						
										<h2 class="panel-title">Payment Method</h2>
									</header>
									<div class="panel-body">
										<div class="row">
											
											<div class="col-md-12">
													<div class="form-group">
						
															<div class="radio-custom radio-inline radio-success" v-validate="'required'">
																<input type="radio" value="challan" v-model="payment" name="payment">
																<label for="radioExample3">Bank Challan</label>
															</div>
															<div class="radio-custom radio-inline radio-success">
																<input type="radio" value="receipt" v-model="payment" name="payment">
																<label for="radioExample3">Confirmation Reciept</label>
															</div>
													</div>


						
													<div class="form-group">

													<label class="col-sm-4 control-label" for="w1-username">Custom Field 1:</label>

														<div class="col-sm-8">

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1name') }">
															<input type="text" v-validate="'alpha_spaces'" placeholder="Custom Field Title" class="form-control input-sm" name="cf1name" v-model="cf1name">
														<span class="customError">{{ errors.first('cf1name') }}</span>
														</div>

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1value') }">
															<input type="text" v-validate="'integer'" placeholder="Custom Field Value" class="form-control input-sm" name="cf1value" v-model="cf1v">
														<span class="customError">{{ errors.first('cf1value') }}</span>
														</div>

														</div>

													</div>

													<div class="form-group">

													<label class="col-sm-4 control-label" for="w1-username">Custom Field 2:</label>

														<div class="col-sm-8">

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1name2') }">
															<input type="text" v-validate="'alpha_spaces'" placeholder="Custom Field Title" class="form-control input-sm" name="cf1name2" v-model="cf1name2">
														<span class="customError">{{ errors.first('cf1name2') }}</span>
														</div>

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1value2') }">
															<input type="text" v-validate="'integer'" placeholder="Custom Field Value" class="form-control input-sm" name="cf1value2" v-model="cf1v2">
														<span class="customError">{{ errors.first('cf1value2') }}</span>
														</div>

														</div>

													</div>

													<div class="form-group">

													<label class="col-sm-4 control-label" for="w1-username">Custom Field 3:</label>

														<div class="col-sm-8">

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1name3') }">
															<input type="text" v-validate="'alpha_spaces'" placeholder="Custom Field Title" class="form-control input-sm" name="cf1name3" v-model="cf1name3">
														<span class="customError">{{ errors.first('cf1name3') }}</span>
														</div>

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1value3') }">
															<input type="text" v-validate="'integer'" placeholder="Custom Field Value" class="form-control input-sm" name="cf1value3" v-model="cf1v3">
														<span class="customError">{{ errors.first('cf1value3') }}</span>
														</div>

														</div>

													</div>

													<div class="form-group">

													<label class="col-sm-4 control-label" for="w1-username">Custom Field 4:</label>

														<div class="col-sm-8">

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1name4') }">
															<input type="text" v-validate="'alpha_spaces'" placeholder="Custom Field Title" class="form-control input-sm" name="cf1name4" v-model="cf1name4">
														<span class="customError">{{ errors.first('cf1name4') }}</span>
														</div>

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1value4') }">
															<input type="text" v-validate="'integer'" placeholder="Custom Field Value" class="form-control input-sm" name="cf1value4" v-model="cf1v4">
														<span class="customError">{{ errors.first('cf1value4') }}</span>
														</div>

														</div>

													</div>


													<div class="form-group">

													<label class="col-sm-4 control-label" for="w1-username">Custom Field 5:</label>

														<div class="col-sm-8">

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1name5') }">
															<input type="text" v-validate="'alpha_spaces'" placeholder="Custom Field Title" class="form-control input-sm" name="cf1name5" v-model="cf1name5">
														<span class="customError">{{ errors.first('cf1name5') }}</span>
														</div>

														<div class="col-sm-6" :class="{'has-error': errors.has('cf1value5') }">
															<input type="text" v-validate="'integer'" placeholder="Custom Field Value" class="form-control input-sm" name="cf1value5" v-model="cf1v5">
														<span class="customError">{{ errors.first('cf1value5') }}</span>
														</div>

														</div>

													</div>

													<div class="form-group" :class="{'has-error': errors.has('Check') }" v-show="(payment != 'challan')">
														<label class="col-sm-4 control-label" for="w1-username">Bank Transaction #:</label>
														<div class="col-sm-8">
															<input type="text" v-validate="'required'" placeholder="Bank Transaction #" class="form-control input-sm" name="Check" v-model="Check">
														<span class="customError">{{ errors.first('Check') }}</span>
														</div>
													</div>

													<div class="form-group" :class="{'has-error': errors.has('Branch') }" v-show="(payment != 'challan')">
														<label class="col-sm-4 control-label" for="w1-username">Branch Name:</label>
														<div class="col-sm-8">
															<input type="text" v-validate="'required|min:3|alpha_spaces'" placeholder="Branch Name" class="form-control input-sm" name="Branch" v-model="Branch">
														<span class="customError">{{ errors.first('Branch') }}</span>
														</div>
													</div>

													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-username">Instructions:</label>
														<div class="col-sm-8">
															<textarea cols="56" rows="4" v-model="Instructions"></textarea>
														</div>
													</div>

													<div class="form-group">
														<div class="col-sm-12">
															<button class="btn btn-success" @click="checkPrintRequirment()">Preview & Print</button>
														</div>
													</div>


											</div>
										</div>
									</div>
								</section>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li class="previous" :class="(proceed == 0) ? 'hideFooter' : ''">
												<a href="javascript:void(0)" @click="prev()"><i class="fa fa-angle-left"></i> Previous</a>
											</li>
											<li class="finish hidden pull-right">
												<a>Finish</a>
											</li>
											<li class="next" :class="(proceed == 2) ? 'hideFooter' : ''">
												<a href="javascript:void(0)" @click="next()">Next <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div>
								</section>
							</div>
							
						</div>

<receipt-table></receipt-table>

</section>

</template>
<!-- Hide element when print popup end -->

						</div>
</template>
<script>
import { Validator } from 'vee-validate'

/*
	For Company Unique Name
*/

  export default {
    // Do not forget this little guy
    name: 'Receipt',
    title: '',
    active: '',
    loading: '',
    proceed: '',
    nextconfig: '',
    nextconfig2: '',
    data(){
    	return {
    		cf1v: '',
    		cf1v2: '',
    		cf1v3: '',
    		cf1v4: '',
    		cf1v5: '',
    		cf1name: '',
    		cf1name2: '',
    		cf1name3: '',
    		cf1name4: '',
    		cf1name5: '',
    		cf1value: '',
    		cf1value2: '',
    		cf1value3: '',
    		cf1value4: '',
    		cf1value5: '',
    		upHere : false,
    		vuemultiselectvalid : false,
    		onoff : [],
    		admissions : [],
    		activeToggle: [],
			Member: '',
			Messer: '',
			Category: '',
			Admission: '',
			charges: [],
			value: null,
			total: 0,
			payment:'',
			Check: '',
			Branch: '',
			Instructions: 'Additional Notes For Member Here',
			checkvalidated: 0,
			hidesubmit: true,
    	}
    },

    computed: {
    	cf1vChanged(){
    			this.cf1value = this.cf1v
    			this.cf1value2 = this.cf1v2
    			this.cf1value3 = this.cf1v3
    			this.cf1value4 = this.cf1v4
    			this.cf1value5 = this.cf1v5

    			var newcharge = ''
    			var treasure = ''
    			 // newcharge = id.cf1value.replace(/[^0-9]/g,'')
    			 treasure = this.total

				var num = parseInt(this.cf1v) || 0
				var num2 = parseInt(this.cf1v2) || 0
				var num3 = parseInt(this.cf1v3) || 0
				var num4 = parseInt(this.cf1v4) || 0
				var num5 = parseInt(this.cf1v5) || 0

    			
				if (num > 0 || num2 > 0 || num3 > 0 || num4 > 0 || num4 > 0) {
					 return this.total = this.$store.state.total + num + num2 + num3 + num4 + num5
				}else{
					 return this.total = this.$store.state.total
				}

    	},
		title(){
    		return this.title = 'Receipts'
    	},
    	active(){
    		return this.active = this.$store.state.collapse
    	},
    	loading(){
    		return this.loading = this.$store.state.loading
    	},
    	makeChecked(){
			return this.$store.state.checkbox
    	},
    	proceed(){
    		return this.proceed = this.$store.state.proceed
    	},
    	nextconfig(){
    		return this.nextconfig = this.$store.state.nextconfig
    	},
    	nextconfig2(){
    		return this.nextconfig2 = this.$store.state.nextconfig2
    	},
    	initnexttab(){
    		if (this.$store.state.nextconfig == 1 && this.$store.state.nextconfig2 == 1) {
    			this.$store.dispatch('next')
    		}
    	},
    	hidesubmit(){
    		if (this.$store.state.proceed == 2) {
    			this.hidesubmit = false
    		}else{
    			this.hidesubmit = true
    		}
    	}

    },
    methods: {
    	prev(){
    		this.$store.dispatch('prev')
    	},
    	checkPrintRequirment(){

			if (this.payment != 'challan') {

					let validPrint = this.validatePrint()

					validPrint.then(res => {
					res.validcheck.then(res => {
						if (res == true) {
							this.checkvalidated = 1	
						}
					})
					res.validbranch.then(res => {
						if (res == true) {

								let data = ''

								data = {

									Member: this.Member,
									Messer: this.Messer,
									Category: this.Category,
									Total : this.total,		
									Check : this.Check,		
									Branch : this.Branch,
									Admission: this.admissions,
									Mode: this.payment,
									Values : this.value,
									Instructions: this.Instructions,
									CF1NAME: this.cf1name,
									CF1VALUE: this.cf1value,
									CF1NAME2: this.cf1name2,
									CF1VALUE2: this.cf1value2,
									CF1NAME3: this.cf1name3,
									CF1VALUE3: this.cf1value3,
									CF1NAME4: this.cf1name4,
									CF1VALUE4: this.cf1value4,
									CF1NAME5: this.cf1name5,
									CF1VALUE5: this.cf1value5,
								}

							this.$store.dispatch('initprint', data)
						}
					})
				})

			}else{

					let data = ''

					data = {

							Member: this.Member,
							Messer: this.Messer,
							Category: this.Category,
							Total : this.total,		
							Check : this.Check,		
							Branch : this.Branch,
							Admission: this.admissions,
							Mode: this.payment,
							Values : this.value,
							Instructions: this.Instructions,
							CF1NAME: this.cf1name,
							CF1VALUE: this.cf1value,
							CF1NAME2: this.cf1name2,
							CF1VALUE2: this.cf1value2,
							CF1NAME3: this.cf1name3,
							CF1VALUE3: this.cf1value3,
							CF1NAME4: this.cf1name4,
							CF1VALUE4: this.cf1value4,
							CF1NAME5: this.cf1name5,
							CF1VALUE5: this.cf1value5,	
					}

					this.$store.dispatch('initprint', data)

			}

    	},
    	async validatePrint(){

    			let validcheck = this.$validator.validate('Check', this.Check)
    			let validbranch = this.$validator.validate('Branch', this.Branch)

    			return await {validcheck, validbranch}
    	},
    	removedItem(id){

    		let newcharge = ''
    		let treasure = ''
    		let admission = ''


    		let index = this.admissions.indexOf(id.title)
    		newcharge = id.price.replace(/[^0-9]/g,'')
    		treasure = parseInt(this.total) || 0

    		let num = parseInt(newcharge) || 0

    		if (index === 0) {
				admission = id.admission.replace(/[^0-9]/g,'')
				let numadmission = parseInt(admission) || 0

				 let shouldsubtract = numadmission + num

				// remove from admissions array
				this.admissions.splice(index, 1);
				this.activeToggle.splice(index, 1);
				this.onoff.splice(index, 1);
				
				this.$store.dispatch('savetotal', this.total - shouldsubtract)
				return this.total -= shouldsubtract
				
    		}else{
    			this.$store.dispatch('savetotal', treasure - num)
    			return this.total = treasure - num
    		}

    	},
    	totalPush(id){

    			var newcharge = ''
    			var treasure = ''
    			 newcharge = id.price.replace(/[^0-9]/g,'')
    			 treasure = parseInt(this.total) || 0

				var num = parseInt(newcharge) || 0

    			
    			this.total = treasure + num

    			this.$store.dispatch('savetotal', this.total)

    			// Trigger this for validation next tab

    			this.vuemultiselectvalid = true


    	},
    	subtractTotal(id){

    		if (!this.onoff.includes(id)) {

					let index = this.admissions.indexOf(id)
					this.admissions.splice(index, 1);

    			let filtered = this.value
    				filtered = this.value.filter(r => r.title === id)

    			var newcharge = ''
    			var treasure = ''
    			 newcharge = filtered[0].admission.replace(/[^0-9]/g,'')
    			 treasure = parseInt(this.total) || 0
    			 var num = parseInt(newcharge) || 0

    			 this.total = treasure - num
    			 this.$store.dispatch('savetotal', this.total)

    		}else{

    				this.admissions.push(id)

    			let filtered = this.value
    				filtered = this.value.filter(r => r.title === id)

    			var newcharge = ''
    			var treasure = ''
    			 newcharge = filtered[0].admission.replace(/[^0-9]/g,'')
    			 treasure = parseInt(this.total) || 0
    			 var num = parseInt(newcharge) || 0

    			 this.total = treasure + num
    			 this.$store.dispatch('savetotal', this.total)
    		}

    	},
    	switchToggle(id){

    		if (!this.onoff.includes(id)) {
    				this.onoff.push(id)
    				this.activeToggle.push(id)
    				this.subtractTotal(id)

    		}else{


					let index = this.onoff.indexOf(id)
					this.onoff.splice(index, 1);

					let index2 = this.activeToggle.indexOf(id)
					this.activeToggle.splice(index2, 1);

					this.subtractTotal(id)

    		}
    	},
    	next(){

    		// Check For Second tab Validation first
    		if (this.vuemultiselectvalid === false) {
	    		let validNext = this.validatevalues()

	    		validNext.then(res => {
	    			res.validMember.then(res => {
	    				if (res == true) {
	    					this.$store.dispatch('nextconfig', 'first')	
	    				}
	    			})
	    			res.validMesser.then(res => {
	    				if (res == true) {
	    					this.$store.dispatch('nextconfig', 'second')
	    					this.initnexttab	
	    				}
	    			})
	    		})

    		}else{

    			this.$store.dispatch('next')

    		}

    	},
    	async validatevalues(){

    			let validMember = this.$validator.validate('Member', this.Member)
    			let validMesser = this.$validator.validate('Messer', this.Messer)

    			return await {validMember, validMesser}
    	},
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
    	axios.get('/charges/charges')
    		.then(json => {
				 this.charges = json.data
    		})
    },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>

.checked{
	display: none;
}
.custommargin{
	margin-bottom: 5%;
}
.custompadding{
	padding-top: 7%;
}
.multiselect__tag{
	background: #0088cc;
}
.customUl{
	list-style: none;
	margin-top: 5%;
}
.customUl li{
	margin-bottom: 3%;
}
.hvr-bounce-to-right {
	background: #e1e1e1;
    color: #666;
    cursor: pointer;
    line-height: 1.2em;
    margin: .4em;
    padding: 1em;
    text-decoration: none;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
.on-background{
	background: #41b883 !important;
}
.bg-secondary {
    background: #41b883;
}
.panel-featured-secondary {
    border-color: #41b883;
}
.removeCharge{
	background: #f79797;
}
.testing{
	background: #d65656;
}
.customzIndex{
	z-index: 0;
}
.hideFooter{
	display: none;
}
	
</style>