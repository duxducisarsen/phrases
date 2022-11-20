<template>
    <blockquote class="card-body mb-0  blockquote">
        <small>
            <cite class="text-muted">
                {{ phrase.phrase }}
            </cite>
        </small>
        <i class="fas fa-lock" title="Solo usted puede ver esta frase" v-if="phrase.is_private == 1"></i>
        <a v-if="phrase && urlEdit" style="#" v-on:click.prevent="toEdit( phrase.id )"><i class="fas fa-pen-square"></i></a>
    </blockquote>
</template>


<script>
    export default {

        name: 'show-phrase',

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

        computed:{ phrase(){ return this.dataTableRows; } },

        methods:
        {
            getRows(){ this.setRowsDatatable( this.urlShow) },

            toEdit(phraseId){
                if (this.urlEdit) {
                    window.location.href = this.urlEdit.replace(':phraseId', phraseId )
                }
            }
        }
    }
</script>