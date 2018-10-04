<template>
<div class="container-fluid no-gutters">
  <div class="row no-gutters">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
      
  <div class="modal-backdrop">
  <div class="modal-dialog modal-xl">


    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="padding:0px;">

<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4" style="border-right:1px dashed black">
<p style="text-align:center;margin:0 0 0px">PBA Copy - Receipt # {{this.invoicenumber}}</p>
  <div style="text-align:center;margin-top:0px;">
    <img src="/images/pba2.png">
  </div>

  <h5 style="text-align:center;text-decoration:underline;"><b>PAKISTAN BUSINESSMEN ASSOCIATION</b></h5> 

<p style="text-align:center;margin:0 0 0px;font-size:11px;">D-5 4th Floor, Osif Center Plot B-25, Block 13-A,</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Tel: +92-21-34975773, 348221881 Fax: +92-21-34821882</p>
<p style="text-align:center;margin:0 0 4px;font-size:11px;">Email: <a>info@apba.org.pk</a>, <a>www.apba.org.pk</a></p>
<p style="text-align:center;margin:0 0 0px;"><b>Bank Al Habib Limited</b></p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">A/C # 1004-0981-056712-01-4</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Hassan Center Branch</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center">Issud on: {{getday}} <span v-html="getdate"></span> {{getmonth}} {{getyear}}</p>

<p style="font-size:11px;line-height:4px;text-align:center;">Mr./Mrs/Miss: <b>{{print.Member}}</b> </p>
<p style="font-size:11px;line-height:4px;text-align:center;">Messer: <b>{{print.Messer}}</b></p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align:center">Details</th>
        <th style="text-align:center">Amount</th>
      </tr>
    </thead>
    <tbody>
    <template v-for="v in print.Values">

    <template v-for="a in print.Admission">

    <template v-if="v.title == a">  

      <tr>
        <td style="font-size:11px">{{v.title}} Admission Fee</td>
        <td style="font-size:11px;">{{v.admission}}</td>
      </tr>

    </template> 

    </template>

      <tr>
        <td style="font-size:11px">{{v.title}}</td>
        <td style="font-size:11px;">{{v.price}}</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME2 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME2}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE2}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME3 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME3}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE3}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME4 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME4}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE4}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME5 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME5}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE5}} PKR</td>
      </tr>
    </template>

      <tr>
        <td style="font-size:11px:float:right;"><b style="float:right;padding-right:5px;">TOTAL</b></td>
        <td><b>{{printvalues.Total + ' PKR'}}</b></td>
      </tr>
    </tbody>
  </table>
  <p style="line-height:10px;">Amount in words: <b style="text-transform:capitalize">{{getTotalInWords(printvalues.Total)}} Rupees Only</b></p>
  <template v-if="printvalues.Mode != 'challan'">
<div style="margin-bottom:7px;">
<p style="margin:0 0 10px;line-height:4px;">Payment Mode: Online Transaction</p>

</div>
<p style="margin:0 0 10px;line-height:4px;">Transaction #: {{printvalues.Check}}</p>
<p style="margin:0 0 10px;line-height:4px;">Branch name: {{printvalues.Branch}}</p>

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
  <p><b>Instructions:</b> {{printvalues.Instructions}}</p>
</div>
</div>
<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4" style="border-right:1px dashed black">
<p style="text-align:center;margin:0 0 0px">Bank Copy - Receipt # {{this.invoicenumber}}</p>
  <div style="text-align:center;margin-top:0px;">
    <img src="/images/pba2.png">
  </div>

  <h5 style="text-align:center;text-decoration:underline;"><b>PAKISTAN BUSINESSMEN ASSOCIATION</b></h5> 

<p style="text-align:center;margin:0 0 0px;font-size:11px;">D-5 4th Floor, Osif Center Plot B-25, Block 13-A,</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Tel: +92-21-34975773, 348221881 Fax: +92-21-34821882</p>
<p style="text-align:center;margin:0 0 4px;font-size:11px;">Email: <a>info@apba.org.pk</a>, <a>www.apba.org.pk</a></p>
<p style="text-align:center;margin:0 0 0px;"><b>Bank Al Habib Limited</b></p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">A/C # 1004-0981-056712-01-4</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Hassan Center Branch</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center">Issud on: {{getday}} <span v-html="getdate"></span> {{getmonth}} {{getyear}}</p>

<p style="font-size:11px;line-height:4px;text-align:center;">Mr./Mrs/Miss: <b>{{print.Member}}</b> </p>
<p style="font-size:11px;line-height:4px;text-align:center;">Messer: <b>{{print.Messer}}</b></p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align:center">Details</th>
        <th style="text-align:center">Amount</th>
      </tr>
    </thead>
    <tbody>
    <template v-for="v in print.Values">

    <template v-for="a in print.Admission">

    <template v-if="v.title == a">  

      <tr>
        <td style="font-size:11px">{{v.title}} Admission Fee</td>
        <td style="font-size:11px;">{{v.admission}}</td>
      </tr>

    </template> 

    </template>

      <tr>
        <td style="font-size:11px">{{v.title}}</td>
        <td style="font-size:11px;">{{v.price}}</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME2 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME2}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE2}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME3 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME3}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE3}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME4 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME4}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE4}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME5 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME5}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE5}} PKR</td>
      </tr>
    </template>

      <tr>
        <td style="font-size:11px:float:right;"><b style="float:right;padding-right:5px;">TOTAL</b></td>
        <td><b>{{printvalues.Total + ' PKR'}}</b></td>
      </tr>
    </tbody>
  </table>
  <p style="line-height:10px;">Amount in words: <b style="text-transform:capitalize">{{getTotalInWords(printvalues.Total)}} Rupees Only</b></p>
  <template v-if="printvalues.Mode != 'challan'">
<div style="margin-bottom:7px;">
<p style="margin:0 0 10px;line-height:4px;">Payment Mode: Online Transaction</p>

</div>
<p style="margin:0 0 10px;line-height:4px;">Transaction #: {{printvalues.Check}}</p>
<p style="margin:0 0 10px;line-height:4px;">Branch name: {{printvalues.Branch}}</p>

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
  <p><b>Instructions:</b> {{printvalues.Instructions}}</p>
</div>
</div>
<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4">
<p style="text-align:center;margin:0 0 0px">Member Copy - Receipt # {{this.invoicenumber}}</p>
  <div style="text-align:center;margin-top:0px;">
    <img src="/images/pba2.png">
  </div>

  <h5 style="text-align:center;text-decoration:underline;"><b>PAKISTAN BUSINESSMEN ASSOCIATION</b></h5> 

<p style="text-align:center;margin:0 0 0px;font-size:11px;">D-5 4th Floor, Osif Center Plot B-25, Block 13-A,</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Tel: +92-21-34975773, 348221881 Fax: +92-21-34821882</p>
<p style="text-align:center;margin:0 0 4px;font-size:11px;">Email: <a>info@apba.org.pk</a>, <a>www.apba.org.pk</a></p>
<p style="text-align:center;margin:0 0 0px;"><b>Bank Al Habib Limited</b></p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">A/C # 1004-0981-056712-01-4</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">Hassan Center Branch</p>
<p style="text-align:center;margin:0 0 0px;font-size:11px;">University Road, Gulshan-e-Iqbal, Karachi-Pakistan.</p>
<p style="text-align:center">Issud on: {{getday}} <span v-html="getdate"></span> {{getmonth}} {{getyear}}</p>

<p style="font-size:11px;line-height:4px;text-align:center;">Mr./Mrs/Miss: <b>{{print.Member}}</b> </p>
<p style="font-size:11px;line-height:4px;text-align:center;">Messer: <b>{{print.Messer}}</b></p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align:center">Details</th>
        <th style="text-align:center">Amount</th>
      </tr>
    </thead>
    <tbody>
    <template v-for="v in print.Values">

    <template v-for="a in print.Admission">

    <template v-if="v.title == a">  

      <tr>
        <td style="font-size:11px">{{v.title}} Admission Fee</td>
        <td style="font-size:11px;">{{v.admission}}</td>
      </tr>

    </template> 

    </template>

      <tr>
        <td style="font-size:11px">{{v.title}}</td>
        <td style="font-size:11px;">{{v.price}}</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME2 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME2}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE2}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME3 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME3}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE3}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME4 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME4}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE4}} PKR</td>
      </tr>
    </template>

    <template v-if="printvalues.CF1NAME5 != ''">
      <tr>
        <td style="font-size:11px">{{printvalues.CF1NAME5}}</td>
        <td style="font-size:11px;">{{printvalues.CF1VALUE5}} PKR</td>
      </tr>
    </template>

      <tr>
        <td style="font-size:11px:float:right;"><b style="float:right;padding-right:5px;">TOTAL</b></td>
        <td><b>{{printvalues.Total + ' PKR'}}</b></td>
      </tr>
    </tbody>
  </table>
  <p style="line-height:10px;">Amount in words: <b style="text-transform:capitalize">{{getTotalInWords(printvalues.Total)}} Rupees Only</b></p>
  <template v-if="printvalues.Mode != 'challan'">
<div style="margin-bottom:7px;">
<p style="margin:0 0 10px;line-height:4px;">Payment Mode: Online Transaction</p>

</div>
<p style="margin:0 0 10px;line-height:4px;">Transaction #: {{printvalues.Check}}</p>
<p style="margin:0 0 10px;line-height:4px;">Branch name: {{printvalues.Branch}}</p>

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


<div style="border:1px solid black;padding-left:5ptext-align:justify;x;">
<p><b>Instructions:</b> {{printvalues.Instructions}}</p>
</div>
</div>
 
      </div>
      <div class="modal-footer" style="border:none">
<div class="col-md-12">
        <div class="col-md-6">
      <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-sm btn-block printButton" @click="cancelPrint()">Back</button>
          
        </div>
        <div class="col-md-6">  
      <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-sm btn-block printButton" @click="printNow()">Save & Print</button>
        </div>
      </div>

<!--         <button type="button" class="btn btn-default printButton" @click="cancelPrint()">Cancel</button>
        <button type="button" class="btn btn-default printButton" @click="printNow()">Save & Print</button> -->
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
    name: 'print',
    data(){
      return {
          d:new Date(),
          printvalues: '',
          invoicenumber: '',
          currentdate:'',
          monthnames: ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"],
          dayformat: ["","1<sup>st</sup>", "2<sup>nd</sup>", "3rd", "4<sup>th</sup>", "5<sup>th</sup>", "6<sup>th</sup>","7<sup>th</sup>", "8<sup>th</sup>", "9<sup>th</sup>", "10<sup>th</sup>", "11<sup>th</sup>", "12<sup>th</sup>", "13<sup>th</sup>", "14<sup>th</sup>", "15<sup>th</sup>", "16<sup>th</sup>", "17<sup>th</sup>", "18<sup>th</sup>", "19<sup>th</sup>", "20<sup>th</sup>", "21<sup>st</sup>","22<sup>nd</sup>","23rd", "24<sup>th</sup>", "25<sup>th</sup>", "26<sup>th</sup>", "27<sup>th</sup>", "28<sup>th</sup>", "29<sup>th</sup>", "30<sup>th</sup>", "31<sup>st</sup>"],
      }
    },
    methods:{
      printNow(){

        axios.post('/invoice',{
            'params':this.printvalues,
            'total_in_words':this.getTotalInWords(this.printvalues.Total),
            'issued_on':this.getday+' '+this.getdate+' '+this.getmonth+' '+this.getyear,
            'instruction': this.instruction
          }).then(res => {
                this.invoicenumber = res.data
                  this.$nextTick(() => {
                    window.print()

                  })

                  // setTimeout( () => {this.$store.dispatch('resetvuex')},1000)
                  setTimeout( () => {window.location = "/dashboard"},500)
                  
          })
      },
      cancelPrint(){
        this.$store.dispatch('initprint')
      },
      getTotalInWords(s){


         var th = ['', 'thousand', 'million', 'billion', 'trillion']
         var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine']
         var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen']
         var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety']



        s = s.toString();
        s = s.replace(/[\, ]/g, '');
        if (s != parseFloat(s)) return 'not a number';
        var x = s.indexOf('.');
        if (x == -1) x = s.length;
        if (x > 15) return 'too big';
        var n = s.split('');
        var str = '';
        var sk = 0;
        for (var i = 0; i < x; i++) {
        if ((x - i) % 3 == 2) {
            if (n[i] == '1') {
                str += tn[Number(n[i + 1])] + ' ';
                i++;
                sk = 1;
            } else if (n[i] != 0) {
                str += tw[n[i] - 2] + ' ';
                sk = 1;
            }
        } else if (n[i] != 0) {
            str += dg[n[i]] + ' ';
            if ((x - i) % 3 == 0) str += 'hundred ';
            sk = 1;
        }
        if ((x - i) % 3 == 1) {
            if (sk) str += th[(x - i - 1) / 3] + ' ';
            sk = 0;
        }
        }
        if (x != s.length) {
        var y = s.length;
        str += 'point ';
        for (var i = x + 1; i < y; i++) str += dg[n[i]] + ' ';
        }
        return str.replace(/\s+/g, ' ');

      },
    },
    computed:{
      print(){
        return this.printvalues = this.$store.state.printvalues
      },
      today(){
        return this.currentdate = new Date()
      },
      getmonth(){
        return this.monthnames[this.d.getMonth()]+','
      },
      getday(){
        return ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][(new Date()).getDay()]
      },
      getdate(){
        return this.dayformat[this.d.getDate()]
      },
      getyear(){
        return this.d.getFullYear()
      }
    },
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