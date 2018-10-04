 <template>
    <div class="custom-actions">
      <button class="btn btn-sm" @click="itemAction('view-item', rowData, rowIndex)"><i class="glyphicon glyphicon-eye-open"></i></button>
      <button class="btn btn-sm" @click="itemAction('change-status', rowData, rowIndex)"><i class="glyphicon glyphicon-refresh" :class="{'glyphicon-refresh-animate' : activeIndex === rowIndex}"></i></button>
      <button class="btn btn-sm" @click="itemAction('delete-item', rowData, rowIndex)"><i class="glyphicon glyphicon-trash alert-danger"></i></button>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        activeIndex: undefined
      }
    },
    props: {
      rowData: {
        type: Object,
        required: true
      },
      rowIndex: {
        type: Number
      }
    },
    computed:{
      clickedStatus(){
        return this.clickedStatus = this.$store.state.status
      }
    },
    methods: {

      itemAction (action, data, index) {
      if (action == 'change-status'){

              this.activeIndex = index

              axios.put('/invoice/'+data.id)
              .then(res => setTimeout(() => {this.activeIndex = undefined, this.$parent.refresh()}, 2000))


        }else if(action === 'view-item'){

            axios.get('/invoice/'+data.id)
                    .then(res => this.$store.dispatch('initviewprint', res.data))
                    
        }
        else{

            swal({
              title: "Are you sure?",
              icon: "warning",
              buttons: ["Back", "Confirm"],
              dangerMode: true,
            }).then((done) => {

              if (done) {
              axios.delete('/invoice/'+data.id)
              .then(res => {

              this.$parent.refresh()
              this.$notify({
                group: 'success',
                type: 'success',
                duration: 4000,
                title: 'Success',
                text: 'Charges removed',
              })
            }
                ).catch(err => {

              this.$parent.refresh()
              this.$notify({
                group: 'success',
                type: 'error',
                duration: 4000,
                title: 'Error',
                text: 'Error! something went wrong',
              })
            }

                )          
              }

            })

        }
      },
      editcharges(){
        conosle.log('clicked')
      }

    }
  }
  </script>

  <style>
    .custom-actions button.ui.button {
      padding: 8px 8px;
    }
    .custom-actions button.ui.button > i.icon {
      margin: auto !important;
    }
    .glyphicon-refresh-animate {
        color: #0088cc;
        -animation: spin 2s infinite linear;
        -webkit-animation: spin2 2s infinite linear;
    }

    @-webkit-keyframes spin2 {
        from { -webkit-transform: rotate(0deg);}
        to { -webkit-transform: rotate(360deg);}
    }

    @keyframes spin {
        from { transform: scale(1) rotate(0deg);}
        to { transform: scale(1) rotate(360deg);}
    }
  </style>