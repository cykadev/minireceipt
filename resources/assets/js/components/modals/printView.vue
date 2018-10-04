<template>
<div class="container-fluid">
  <div class="row no-gutters">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
      
  <div class="modal-backdrop">
  <div class="modal-dialog modal-xl">


    <!-- Modal content-->
    <div class="modal-content">

<div class="modal-body" style="padding:0px;">

<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4" style="border-right:1px dashed black">
<p style="text-align:center;margin:0 0 0px">PBA Copy - Receipt # {{printvalues[0]['invoice_id']}}</p>
  <div style="text-align:center;margin-top:0px;">
    <img src="/images/pba2.png">
  </div>

 

<p style="text-align:center;margin:0 0 0px;font-size:11px;">D-5 4th Floor, Osif Center Plot B-25, Block 13-A,</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Tel: +92-21-34975773, 348221881 Fax: +92-21-34821882</p>
<p style="text-align:center;margin:0 0 4px;font-size:11px;">Email: <a>info@apba.org.pk</a>, <a>www.apba.org.pk</a></p>
<p style="text-align:center;margin:0 0 0px;"><b>Bank Al Habib Limited</b></p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">A/C # 1004-0981-056712-01-4</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Hassan Center Branch</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center" v-html="printvalues[0]['issued_on']">Issud on: {{printvalues[0]['issued_on']}}</p>

<p style="font-size:11px;line-height:4px;text-align:center;">Mr./Mrs/Miss: {{printvalues[0]['invoice_for']}}<b></b> </p>
<p style="font-size:11px;line-height:4px;text-align:center;">Messer: {{printvalues[0]['invoice_messer']}}<b></b></p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align:center">Details</th>
        <th style="text-align:center">Amount</th>
      </tr>
    </thead>
    <tbody>
    <template v-for="v in printvalues[0]['childs']">

    <template v-if="v.admission == 1">  

      <tr>
        <td style="font-size:11px">{{v.title}} Admission Fee</td>
        <td style="font-size:11px;">{{v.admission_price}}</td>
      </tr>

    </template> 


      <tr>
        <td style="font-size:11px">{{v.title}}</td>
        <td style="font-size:11px;">{{v.price}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name2']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name2']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value2']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name3']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name3']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value3']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name4']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name4']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value4']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name5']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name5']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value5']}}</td>
      </tr>
    </template>

      <tr>
        <td style="font-size:11px:float:right;"><b style="float:right;padding-right:5px;">TOTAL</b></td>
        <td><b>{{printvalues[0]['total']+' PKR'}}</b></td>
      </tr>
    </tbody>
  </table>
  <p style="line-height:10px;">Amount in words: <b style="text-transform:capitalize">{{printvalues[0]['total_in_words'] + ' Rupees Only' }}</b></p>
  <template v-if="printvalues[0]['payment_mode'] != 'challan'">
<div style="margin-bottom:7px;">
<p style="margin:0 0 10px;line-height:4px;">Payment Mode: Online Transaction</p>

</div>
<p style="margin:0 0 10px;line-height:4px;">Transaction #: {{printvalues[0]['transaction_id']}}</p>
<p style="margin:0 0 10px;line-height:4px;">Branch name: {{printvalues[0]['branch_name']}}</p>

<div class="row" style="margin-top:20%">
  <div class="col-md-12">
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
    <p style="">____________________</p>
    <p style="">PBA Accountant</p>
      
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
      
    <p style="">____________________</p>
    <p style="">Stamp</p>
    </div>
  </div>
</div>
</template>

<template v-else>

<div class="row" style="margin-top:20%">
  <div class="col-md-12">
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
    <p style="">____________________</p>
    <p style="">Recieved by</p>
      
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
      
    <p style="">____________________</p>
    <p style="">Stamp</p>
    </div>
  </div>
</div>

</template>

<div style="border:1px solid black;padding-left:5px;text-align:justify;">
<p><b>Instructions:</b> {{printvalues[0]['instruction']}}</p></div>
</div>

<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4" style="border-right:1px dashed black">
<p style="text-align:center;margin:0 0 0px">Bank Copy - Receipt # {{printvalues[0]['invoice_id']}}</p>
  <div style="text-align:center;margin-top:0px;">
    <img src="/images/pba2.png">
  </div>

 

<p style="text-align:center;margin:0 0 0px;font-size:11px;">D-5 4th Floor, Osif Center Plot B-25, Block 13-A,</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Tel: +92-21-34975773, 348221881 Fax: +92-21-34821882</p>
<p style="text-align:center;margin:0 0 4px;font-size:11px;">Email: <a>info@apba.org.pk</a>, <a>www.apba.org.pk</a></p>
<p style="text-align:center;margin:0 0 0px;"><b>Bank Al Habib Limited</b></p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">A/C # 1004-0981-056712-01-4</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Hassan Center Branch</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center" v-html="printvalues[0]['issued_on']">Issud on: {{printvalues[0]['issued_on']}}</p>

<p style="font-size:11px;line-height:4px;text-align:center;">Mr./Mrs/Miss: {{printvalues[0]['invoice_for']}}<b></b> </p>
<p style="font-size:11px;line-height:4px;text-align:center;">Messer: {{printvalues[0]['invoice_messer']}}<b></b></p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align:center">Details</th>
        <th style="text-align:center">Amount</th>
      </tr>
    </thead>
    <tbody>
    <template v-for="v in printvalues[0]['childs']">

    <template v-if="v.admission == 1">  

      <tr>
        <td style="font-size:11px">{{v.title}} Admission Fee</td>
        <td style="font-size:11px;">{{v.admission_price}}</td>
      </tr>

    </template> 


      <tr>
        <td style="font-size:11px">{{v.title}}</td>
        <td style="font-size:11px;">{{v.price}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name2']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name2']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value2']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name3']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name3']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value3']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name4']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name4']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value4']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name5']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name5']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value5']}}</td>
      </tr>
    </template>

      <tr>
        <td style="font-size:11px:float:right;"><b style="float:right;padding-right:5px;">TOTAL</b></td>
        <td><b>{{printvalues[0]['total']+' PKR'}}</b></td>
      </tr>
    </tbody>
  </table>
  <p style="line-height:10px;">Amount in words: <b style="text-transform:capitalize">{{printvalues[0]['total_in_words'] + ' Rupees Only' }}</b></p>
  <template v-if="printvalues[0]['payment_mode'] != 'challan'">
<div style="margin-bottom:7px;">
<p style="margin:0 0 10px;line-height:4px;">Payment Mode: Online Transaction</p>

</div>
<p style="margin:0 0 7px;line-height:4px;">Transaction #: {{printvalues[0]['transaction_id']}}</p>
<p style="margin:0 0 10px;line-height:4px;">Branch name: {{printvalues[0]['branch_name']}}</p>

<div class="row" style="margin-top:20%">
  <div class="col-md-12">
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
    <p style="">____________________</p>
    <p style="">PBA Accountant</p>
      
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
      
    <p style="">____________________</p>
    <p style="">Stamp</p>
    </div>
  </div>
</div>
</template>

<template v-else>

<div class="row" style="margin-top:20%">
  <div class="col-md-12">
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
    <p style="">____________________</p>
    <p style="">Recieved by</p>
      
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
      
    <p style="">____________________</p>
    <p style="">Stamp</p>
    </div>
  </div>
</div>

</template>

<div style="border:1px solid black;padding-left:5px;text-align:justify;">
<p><b>Instructions:</b> {{printvalues[0]['instruction']}}</p></div>
</div>

<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4">
<p style="text-align:center;margin:0 0 0px">Member Copy - Receipt # {{printvalues[0]['invoice_id']}}</p>
  <div style="text-align:center;margin-top:0px;">
    <img src="/images/pba2.png">
  </div>

 

<p style="text-align:center;margin:0 0 0px;font-size:11px;">D-5 4th Floor, Osif Center Plot B-25, Block 13-A,</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Tel: +92-21-34975773, 348221881 Fax: +92-21-34821882</p>
<p style="text-align:center;margin:0 0 4px;font-size:11px;">Email: <a>info@apba.org.pk</a>, <a>www.apba.org.pk</a></p>
<p style="text-align:center;margin:0 0 0px;"><b>Bank Al Habib Limited</b></p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">A/C # 1004-0981-056712-01-4</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Hassan Center Branch</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center" v-html="printvalues[0]['issued_on']">Issud on: {{printvalues[0]['issued_on']}}</p>

<p style="font-size:11px;line-height:4px;text-align:center;">Mr./Mrs/Miss: {{printvalues[0]['invoice_for']}}<b></b> </p>
<p style="font-size:11px;line-height:4px;text-align:center;">Messer: {{printvalues[0]['invoice_messer']}}<b></b></p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align:center">Details</th>
        <th style="text-align:center">Amount</th>
      </tr>
    </thead>
    <tbody>
    <template v-for="v in printvalues[0]['childs']">

    <template v-if="v.admission == 1">  

      <tr>
        <td style="font-size:11px">{{v.title}} Admission Fee</td>
        <td style="font-size:11px;">{{v.admission_price}}</td>
      </tr>

    </template> 


      <tr>
        <td style="font-size:11px">{{v.title}}</td>
        <td style="font-size:11px;">{{v.price}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name2']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name2']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value2']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name3']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name3']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value3']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name4']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name4']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value4']}}</td>
      </tr>
    </template>

      <template v-if="printvalues[0]['cf1name5']">
      <tr>
        <td style="font-size:11px">{{printvalues[0]['cf1name5']}}</td>
        <td style="font-size:11px;">{{printvalues[0]['cf1value5']}}</td>
      </tr>
    </template>

      <tr>
        <td style="font-size:11px:float:right;"><b style="float:right;padding-right:5px;">TOTAL</b></td>
        <td><b>{{printvalues[0]['total']+' PKR'}}</b></td>
      </tr>
    </tbody>
  </table>
  <p style="line-height:10px;">Amount in words: <b style="text-transform:capitalize">{{printvalues[0]['total_in_words'] + ' Rupees Only' }}</b></p>
  <template v-if="printvalues[0]['payment_mode'] != 'challan'">
<div style="margin-bottom:7px;">
<p style="margin:0 0 10px;line-height:4px;">Payment Mode: Online Transaction</p>

</div>
<p style="margin:0 0 7px;line-height:4px;">Transaction #: {{printvalues[0]['transaction_id']}}</p>
<p style="margin:0 0 10px;line-height:4px;">Branch name: {{printvalues[0]['branch_name']}}</p>

<div class="row" style="margin-top:20%">
  <div class="col-md-12">
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
    <p style="">____________________</p>
    <p style="">PBA Accountant</p>
      
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
      
    <p style="">____________________</p>
    <p style="">Stamp</p>
    </div>
  </div>
</div>
</template>

<template v-else>

<div class="row" style="margin-top:20%">
  <div class="col-md-12">
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
    <p style="">____________________</p>
    <p style="">Recieved by</p>
      
    </div>
    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-center">
      
    <p style="">____________________</p>
    <p style="">Stamp</p>
    </div>
  </div>
</div>

</template>

<div style="border:1px solid black;padding-left:5px;text-align:justify;">
<p><b>Instructions:</b> {{printvalues[0]['instruction']}}</p></div>
</div>
 
      </div>
      
      <div class="modal-footer" style="border:none">
      <div class="col-md-12">
        <div class="col-md-6">
      <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-sm btn-block printButton" @click="cancel()">Back</button>
          
        </div>
        <div class="col-md-6">  
      <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-sm btn-block printButton" @click="duplicatePrint()">Print Duplicate</button>
        </div>
      </div>
<!--         <button type="button" class="btn btn-default printButton" @click="cancel()">Back</button>
        <button type="button" class="btn btn-default printButton" @click="duplicatePrint()">Print</button> -->
      </div>
    </div>

  </div>

  </div>
</div>
</div>
</div>

</template>

<script>
import axios from 'axios'
import store from '../../store/index'

/*
  For Company Unique Name
*/
  export default {
    name: 'printview',
    data(){
      return {
        printvalues: this.$store.state.printvalues,
      }
    },
    computed:{
      // printdata(){
      //    return this.printvalues = 
      // }
    },
    methods:{
      cancel(){
          this.$store.dispatch('initviewprint')
      },
      duplicatePrint(){

          this.$store.dispatch('initprint')
                this.$nextTick(() => {
                  window.print()

                })

                window.location = "/dashboard"
      },
    }
   
  }
</script>

<style scoped>
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
@media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}
@media (min-width: 992px) {
  .modal-xl {
    width: 1200px;
  }
}
@media print {
   .printButton{
      display: none;
   }
   .modal-content{
    border: none;
   }
}

.row.no-gutters {
margin-right: 0;
margin-left: 0; }

.row.no-gutters [class^="col-"],
.row.no-gutters [class*=" col-"]{
padding-right: 6px;
padding-left: 6px;
 }

 tbody tr td{
  padding: 0px;
  padding-left: 5px;
 }
p{
  line-height: 11px;
  font-size: 11px;
}
.fontbold{
  font-weight: bolder;
}


</style>