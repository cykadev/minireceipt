<template>
  <div @click="onClick">
    <div class="inline field">
      <label>Title: </label>
      <span>{{rowData.title}}</span>
    </div>
    <div class="inline field">
      <label>Price: </label>
      <span>{{rowData.price}}</span>
    </div>
    <div class="inline field">
      <label>Admission: </label>
      <span>{{rowData.admission}}</span>
    </div>
    <div class="inline field">
      <label>Category: </label>
        <span v-if="rowData.category == 1">{{'Membership'}}</span>
        <span v-else-if="rowData.category == 2">{{'Recommendation'}}</span>
        <span v-else>{{'Miscellaneous'}}</span>
    </div>
    <div class="inline field">
      <label>Applicable: </label>
      <span>{{(rowData.applicable == 1) ? 'True' : 'False'}}</span>
    </div>
    <div class="inline field">
      <label>Created At: </label>
      <span>{{rowData.created_at}}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  methods: {
    onClick (event) {
      // console.log('my-detail-row: on-click', event.target)
    }
  },
}
</script>