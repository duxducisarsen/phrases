<template>
    <blockquote class="card-body mb-0  blockquote">
        <small>
            <cite class="text-muted">
                {{ frase.frase }}
            </cite>
        </small>
        <i class="fas fa-lock" title="Solo usted puede ver esta frase" v-if="frase.nivel_privacidad == 1"></i>
        <a v-if="frase && urlEdit" style="#" v-on:click.prevent="toEdit( frase.id )"><i class="fas fa-pen-square"></i></a>
    </blockquote>
</template>


<script>
    export default {

        name: 'show-frase-inspiracion',

        props: {
            urlEdit:{
                required: false,
                type: String,
                default: ''
            },
            urlShow:{
                required: true,
                type: String
            }
        },

        created() { this.getRows(); },

        mixins: [dataTableMixin],

        computed:{ frase(){ return this.dataTableRows; } },

        methods:
        {
            getRows(){ this.setRowsDatatable( this.urlShow) },

            toEdit(frase_id){
                if (this.urlEdit) {
                    window.location.href = this.urlEdit.replace(':frase_id', frase_id )
                }
            }
        }
    }
</script>