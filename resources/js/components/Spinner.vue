<template>
    <div class="spinner">
        <i class="fa fa-spinner fa-spin" :class="sizeClass"></i>
    </div>
</template>

<script>
export default {
    props: {
        small: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        sizeClass () {
            return this.small ? '' : 'fa-3x'
        }
    }
}
</script>

<style scoped>
.spinner {
    color: #ddd; 
    text-align: center;
}
</style>