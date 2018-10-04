<template>

  <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          <h3>{{formtitle}}</h3>
        </slot>
      </header>
      <section class="modal-body">


      <div class="form-group" :class="{'has-error': errors.has('Category') }">
        <div class="col-md-12">
          <div class="input-group">
          <span class="input-group-addon btn-primary">Category</span>
            <select name="Category" class="form-control" v-model="Category">
              <option value="1" :selected="(Category == 1) ? 'selected' : ''">Membership</option>
              <option value="2" :selected="(Category == 2) ? 'selected' : ''">Recommendation</option>
              <option value="3" :selected="(Category == 3) ? 'selected' : ''">Miscellaneous</option>
            </select>
          </div>
        <span class="customError">{{ errors.first('Category') }}</span>
        </div>
      </div>


      <div class="form-group" :class="{'has-error': errors.has('Title') }">
      <div class="col-md-12">
        <div class="input-group">
         <span class="input-group-addon btn-primary">Title</span>
         <input v-validate="'required|min:3|unique'" type="text" name="Title" class="form-control" placeholder="Company Title" v-model="Title">
        </div>
        <span class="customError">{{ errors.first('Title') }} </span>
        </div>
        </div>

      <div class="form-group" :class="{'has-error': errors.has('Price') }">
      <div class="col-md-12">
        <div class="input-group">
         <span class="input-group-addon btn-primary">Price</span>
         <input v-validate="'required|integer'" type="text" name="Price" class="form-control" placeholder="Price" v-model="Price">
        </div>
        <span class="customError">{{ errors.first('Price') }}</span>
        </div>
        </div>

      <div class="form-group">
        <div class="col-md-12">
          <label class="col-md-3 control-label">Admission Fee? </label>
            <div class="col-md-8">
              <div class="radio-custom radio-inline radio-primary">
                <input name="Admission" type="radio" required="" aria-required="true" :checked="checkCondition2" @click="toggle('yes')">
                <label for="Yes">Yes</label>
              </div>
              <div class="radio-custom radio-inline radio-primary" style="margin-bottom:7px;">
                <input name="Admission" type="radio" :checked="checkCondition" @click="toggle('no')">
                <label for="No">No</label>
              </div>
              <label class="error" for="porto_is"></label>
            </div>
          </div>
      </div>

        <div class="form-group" :class="{'has-error': errors.has('Admission'), 'classchecked' : Admission == '', 'classchecked' : makeChecked == 0}">
          <div class="col-md-12">
            <div class="input-group">
            <span class="input-group-addon btn-primary">Admission Fee</span>
            <input v-validate="'numeric'" type="text" name="Admission" class="form-control" v-model="Admission" placeholder="Price">
            </div>
          <span class="customError">{{ errors.first('Admission') }}</span>
          </div>
        </div>


          </form>
       </section>
       <footer class="modal-footer">
          <div class="cancel">
            <a @click="close">Cancel</a>
          </div>
          <div class="submit">
            <a @click="submitForm()">Submit</a>
          </div>
      </footer>
    </div>
  </div>

</template>

<script>
import { Validator } from 'vee-validate'
import axios from 'axios'
import store from '../../store/index'

/*
  For Company Unique Name
*/
const EditUnique = value => new Promise((resolve) => {
  setTimeout(() => {
    axios.get('/charges/checkUniqueCompanySame/'+store.state.pushabledata.data.fields.id+'/'+value).then(
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

Validator.extend('unique', {
  validate: EditUnique,
  getMessage: (field, params, data) => data.message
})





  export default {
    name: 'editmodal',
    formtitle:'',
    methodName: '',
    data(){
      return {
      id: this.$store.state.pushabledata.data.fields.id,
      Title: this.$store.state.pushabledata.data.fields.field1,
      Price: this.$store.state.pushabledata.data.fields.field2,
      Category: this.$store.state.pushabledata.data.fields.field3,
      Admission: this.$store.state.pushabledata.data.fields.field4,
      }
    },
    computed:{
      formtitle(){
        return this.formtitle = 'Edit Charges'
      },
      methodName(){
        return this.methodName = this.$store.state.method
      },
      makeChecked(){
      return this.$store.state.checkbox
      },
      checkCondition(){

        if (this.Admission == '' && this.makeChecked == 0) {
            return 'checked'
        }else{
            return ''
        }
      },
      checkCondition2(){

        if (this.Admission == true && this.makeChecked == 1) {
            return ''
        }else{
            return 'checked'
        }
      },
    },
    methods: {
      close() {
          this.$store.dispatch('initModal')
      },
      toggle(data){
          this.$store.dispatch('triggercheck', data)
      },
      submitForm(){
        this.$validator.validateAll().then((result) => {

          if (result) {

          axios.put('/charges/'+this.id,{
              params:{
                purpose:'edit',
                title:this.Title,
                price:this.Price,
                category:this.Category,
                admission:this.Admission,
              }
            }
          ).then(res => {

            if (res.data.success === false) {
                  this.$notify({
                group: 'success',
                type: 'error',
                duration: 4000,
                title: 'Error',
                text: res.data.error,

              })

            }else{
              this.$store.dispatch('initModal')
              this.$events.fire('filter-reset')

              this.$notify({
                group: 'success',
                type: 'success',
                title: 'Success',
                duration: 4000,
                text: 'Charges added successfully.'
              })

            }
          })



          // axios.post('/charges/editcharges/'+this.id+'?title='+this.Title+'&price='+this.Price
          // ).then(res => {
          //   if (res.data.success === false) {
          //         this.$notify({
          //       group: 'success',
          //       type: 'error',
          //       duration: 4000,
          //       title: 'Error',
          //       text: res.data.error,
          //     });
          //   }else{

          //     this.$store.dispatch('initModal')
          //     this.$events.fire('filter-reset')

          //     this.$notify({
          //       group: 'success',
          //       type: 'success',
          //       title: 'Success',
          //       duration: 4000,
          //       text: 'Charges added successfully.'
          //     });

          //     // this.$refs.vuetable.refresh()
          //     // this.$store.dispatch('triggervuetable')
          //   }
          // })

          }
        }).catch(err => console.log(err))
      },
      editcharges(){
        // Loader
      }

    },
  }
</script>

<style>

  .cancel{
    text-align: center;
    width: 50%;
  }

  .cancel:hover{
    cursor:pointer;
    color: #3d99d8;
  }

  .submit:hover{
    cursor:pointer;
    color: #3d99d8;
  }

  .submit{
    text-align: center;
    width: 50%;
  }
  .modal-backdrop {
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    margin-top: 10%;
    margin-bottom: 10%;
    width: 55%;
    position: sticky !important;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
  }

  .modal-footer {
    display: flex;
  }

  h3{
    font-weight: bolder;
  }
  .modal-header {
    border-bottom: 1px solid #eeeeee;
    background-color: #3d99d8;
    color:#ffffff;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: flex-end;
  }

  .modal-body {
    padding: 20px 10px;
  }
  .classchecked{
    display: none;
  }
</style>