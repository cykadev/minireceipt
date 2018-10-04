<template>
  <div>
    <receipt-filter-bar></receipt-filter-bar>
    <!-- http://vuetable.ratiw.net/api/users -->
    <receiptvuetable ref="vuetableinvoice"
      api-url="/invoice"
      :fields="fields"
      pagination-path=""
      :css="css.table"
      :sort-order="sortOrder"
      :multi-sort="true"
      detail-row-component="receipt-detail-row"
      :append-params="moreParams"
      @vuetable:pagination-data="onPaginationData"
    ></receiptvuetable>
    <div class="vuetable-pagination">
      <vuetable-pagination-info ref="paginationInfoReceipt"
        info-class="pagination-info"
      ></vuetable-pagination-info>
      <vuetable-pagination ref="paginationReceipt"
        :css="css.pagination"
        @vuetable-pagination:change-page="onChangePage"
      ></vuetable-pagination>
    </div>
  </div>
</template>

<script>
import accounting from 'accounting'
import moment from 'moment'
import receiptvuetable from 'vuetable-2'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import VueEvents from 'vue-events'
import CustomActions from './actions/CustomAction'
import DetailRow from './actions/DetailRow'
import FilterBar from './actions/FilterBar'
Vue.use(VueEvents)
Vue.component('receipt-custom-actions', CustomActions)
Vue.component('receipt-detail-row', DetailRow)
Vue.component('receipt-filter-bar', FilterBar)

        // {
        //   name: '__checkbox',
        //   titleClass: 'text-center',
        //   dataClass: 'text-center',
        // },
export default {
  components: {
    receiptvuetable,
    VuetablePagination,
    VuetablePaginationInfo,
  },
  data () {
    return {
      fields: [
        {
          name: '__sequence',
          title: '#',
          titleClass: 'text-right',
          dataClass: 'text-right'
        },
        {
          name: 'invoice_id',
          sortField: 'invoice_id',
        },
        {
          name: 'invoice_for',
          sortField: 'invoice_for'
        },
        {
          name: 'invoice_messer',
          sortField: 'invoice_messer'
        },     
        {
          name: 'invoice_status',
          sortField: 'invoice_status',
          titleClass: 'text-center',
          callback: 'appornot'
        },
        {
          name: 'issued_on',
          sortField: 'issued_on'
        },
        {
          name: '__component:receipt-custom-actions',
          title: 'Manage',
          titleClass: 'text-center',
          dataClass: 'text-center'
        }
      ],
      css: {
        table: {
          tableClass: 'table table-bordered table-striped table-hover',
          ascendingIcon: 'glyphicon glyphicon-chevron-up',
          descendingIcon: 'glyphicon glyphicon-chevron-down'
        },
        pagination: {
          wrapperClass: 'pagination',
          activeClass: 'active',
          disabledClass: 'disabled',
          pageClass: 'page',
          linkClass: 'link',
          icons: {
            first: '',
            prev: '',
            next: '',
            last: '',
          },
        },
        icons: {
          first: 'glyphicon glyphicon-step-backward',
          prev: 'glyphicon glyphicon-chevron-left',
          next: 'glyphicon glyphicon-chevron-right',
          last: 'glyphicon glyphicon-step-forward',
        },
      },
      sortOrder: [
        { field: 'invoice_id', sortField: 'invoice_id', direction: 'desc'}
      ],
      moreParams: {}
    }
  },
  methods: {
    allcap (value) {
      return value.toUpperCase()
    },
    appornot (value) {
      return value === 1
        ? '<span class="label label-success"> Paid</span>'
        : '<span class="label label-warning"> Pending</span>'
    },
    maincat (value) {

      if (value == 1) {
          return 'Membership'
      }else if(value == 2){
          return 'Recomendation'
      }else{
          return 'Miscellaneous'
      }
    },
    formatNumber (value) {
      return accounting.formatNumber(value, 2)
    },
    formatDate (value, fmt = 'D MMM YYYY') {
      return (value == null)
        ? ''
        : moment(value, 'YYYY-MM-DD').format(fmt)
    },
    onPaginationData (paginationData) {
      this.$refs.paginationReceipt.setPaginationData(paginationData)
      this.$refs.paginationInfoReceipt.setPaginationData(paginationData)
    },
    onChangePage (page) {
      this.$refs.vuetableinvoice.changePage(page)
    },
  },
  events: {
    'filter-set' (filterText) {
      this.moreParams = {
        filter: filterText
      }
      Vue.nextTick( () => this.$refs.vuetableinvoice.refresh() )
    },
    'filter-reset' () {
      this.moreParams = {}
      Vue.nextTick( () => this.$refs.vuetableinvoice.refresh() )
    }
  }
}
</script>
<style>
.pagination {
  margin: 0;
  float: right;
}
.pagination a.page {
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 10px;
  margin-right: 2px;
}
.pagination a.page.active {
  color: white;
  background-color: #337ab7;
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 10px;
  margin-right: 2px;
}
.pagination a.btn-nav {
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 7px;
  margin-right: 2px;
}
.pagination a.btn-nav.disabled {
  color: lightgray;
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 7px;
  margin-right: 2px;
  cursor: not-allowed;
}
.pagination-info {
  float: left;
}
</style>