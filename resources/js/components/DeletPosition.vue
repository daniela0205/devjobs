
<template>
    <button
        class="text-red-600 hover:text-red-900  mr-5"
        @click="deletePosition"
        >Delet</button>

</template>

<script>
export default {
    props:['positionId'],
    methods:{
        deletePosition(){
            console.log("deleting..."+this.positionId)
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    const params = {
                        id:this.positionId,
                        _method: 'delete'
                    }

                    axios.post(`./positions/${this.positionId}`, params)
                        .then(resulte=>{
                            console.log(resulte);
                             this.$swal.fire(
                            'Deleted!',
                            resulte.data.message,
                            'success'
                            );
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                        })
                        .catch(error=>{
                            console.log(error);
                        });


                }
                })
        }
    }
}
</script>
