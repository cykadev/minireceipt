<template>
    <div class="filter-bar">
      <form class="form-inline">
        <div class="form-group">
          <label>Search for:</label>
          <input type="text" v-model="filterText" class="form-control" @keyup.enter="doFilter" placeholder="Title">
          <button class="btn" @click.prevent="doFilter">Go</button>
          <button class="btn" @click.prevent="resetFilter">Reset</button>
        </div>
<!--           <button class="btn pull-right margin" @click.prevent="UpdateSelected">Update</button>
          <button class="btn pull-right" @click.prevent="RemoveSelected">Remove</button> -->
      </form>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        filterText: ''
      }
    },
    methods: {
      doFilter () {
        this.$events.fire('filter-set', this.filterText)
      },
      UpdateSelected () {
        // this.$events.fire('filter-set', this.filterText)
        console.log(this.$refs.vuetable.selectedTo[x])
      },
      RemoveSelected () {
        // this.$events.fire('filter-set', this.filterText)
        console.log('remove_all')
      },
      resetFilter () {
        this.filterText = ''
        this.$events.fire('filter-reset')
      }
    }
  }
</script>
<style scoped>
.filter-bar {
  padding: 10px;
}
.margin{
  margin-left: 1%;
}
</style>