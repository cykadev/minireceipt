import Vuex from 'vuex';
import Vue from 'vue';
import axios from 'axios';

Vue.use(Vuex);
const store = new Vuex.Store({
	state:{
		collapse: 1,
		loading: 0,
		editmodalopen: false,
		pushabledata: [],
		method: '',
		checkbox: 0,
		proceed: 0,
		nextconfig: 0,
		nextconfig2: 0,
		print: 0,
		total: 0,
		printvalues: [],
		printview:false,
		printwatch:false,
	},
	getters:{
	},
	actions:{
		resetvuex(context){
			context.commit('commitReset')
		},
		collapseData(context) {
			context.commit('updateCollapse')
		},
		initLoading(context){
			context.commit('updateLoadingState')
		},
		initSidebar(context){
			context.commit('updateSidebarState')
		},
		initModal(context){
			context.commit('updateeditModalOpen')
		},
		initprint(context, payload){
			context.commit('showprintpage')
		},
		pushdata(context, payload){
			context.commit('pushEditModalData', payload)
		},
		initprogress(context, payload){
			context.commit('pushProgress', payload)
		},
		triggervuetable(context){
			context.commit('vuetableRefresh')
		},
		triggercheck(context, payload){
			context.commit('toggleCheckbox', payload)
		},
		next(context){
			context.commit('incrementproceed')
		},
		prev(context, payload){
			context.commit('decrementproceed')
		},
		nextconfig(context, payload){
			context.commit('furtherstep', payload)
		},
		initprint(context, payload){
			context.commit('proceedtoprint', payload)
		},
		initviewprint(context, payload){
			context.commit('proceedviewprint', payload)
		},
		savetotal(context, payload){
			context.commit('saveTotalForLaterUse', payload)
		},

	},
	mutations:{
		saveTotalForLaterUse(state, payload){
			state.total = payload
		},
		commitReset(state){

				state.collapse = 1
				state.loading = 0
				state.editmodalopen = false
				state.pushabledata = []
				state.method = ''
				state.checkbox = 0
				state.proceed = 0
				state.nextconfig = 0
				state.nextconfig2 = 0
				state.print = 0
				state.printvalues = []
				state.printview = false
				state.printwatch = false

		},
		proceedtoprint(state, payload){
			if (state.printview == true) {
				state.printvalues = ''
					state.printview = false
			}else{
				state.printvalues = payload
					state.printview = true
			}
		},
		proceedviewprint(state, payload){
			if (state.printwatch == true) {
				state.printvalues = ''
					state.printwatch = false
			}else{
				state.printvalues = payload
					state.printwatch = true
			}
		},
		updateCollapse(state){
			if (state.collapse == 1) {
					state.collapse = 0
			}else{
					state.collapse = 1
			}
		},
		updateLoadingState(state){
			if (state.loading == 1) {
					state.loading = 0
			}else{
					state.loading = 1
			}
		},
		updateeditModalOpen(state){
			if (state.editmodalopen) {
					state.editmodalopen = false
			}else{
					state.editmodalopen = true
			}
		},
		showprintpage(state, payload){
			if (state.printview) {
					state.printview = false
			}else{
					state.printview = true
			}
		},
		pushEditModalData(state, data){
			state.pushabledata = data
			state.method = data.data.method
		},
		vuetableRefresh(state){
			state.pushabledata = data
		},
		toggleCheckbox(state, data){
			if (state.checkbox == 1) {
				state.checkbox = 0
			}else{
				state.checkbox = 1
			}
		},
		incrementproceed(state){
			state.proceed += 1
		},
		decrementproceed(state, data){
			state.proceed -= 1
		},
		furtherstep(state, payload){
			if (payload == 'first') {
				state.nextconfig = 1
			}else if(payload == 'second'){
				state.nextconfig2 = 1
			}else{
				state.nextconfig = 0
				state.nextconfig2 = 0
			}

		},
	}
})

export default store