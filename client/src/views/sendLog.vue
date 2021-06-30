
<template>

    <div 
        class="logs_main"
        :class="{'container_sm_screen': isSmallScreen, 'container_md_screen':isMdScreen}"
    > 
        <h3 class="send_log_title"> Logs</h3>

        <!-- Filters -->
        <v-row class="filter">
            
            <!-- Dates -->
            <v-col cols="12" md="6" lg="4"> 
                <v-row>
                    <v-col cols="12" md="6" lg="6">
                        <datePicker :label="'Start Date'" @updateDate="updateDateFrom"/>
                    </v-col>
                    <v-col cols="12" md="6" lg="6">
                        <datePicker :label="'End Date'" @updateDate="updateDateTo"/>
                    </v-col>
                </v-row>
            </v-col>

            <!-- User Filter-->
            <v-col cols="12" md="6" lg="3">
                <v-select
                    :items="aUsers"
                    label="Choose User"
                    v-model="filter.usr_id"
                ></v-select>
            </v-col>

            <!-- Country Filter-->
            <v-col cols="12" md="6" lg="3">
                <v-select
                    :items="aCountries"
                    label="Choose Country"
                    v-model="filter.cnt_id"
                ></v-select>
            </v-col>

            <v-col cols="12" md="6" lg="2">
                <button 
                class="filter_btn" @click="getDataTable" :disabled="!isValidBtn">
                    Search
                </button>
            </v-col>
        </v-row>

        <!-- activate progress while waiting for receiving data-->
        <v-overlay :value="overlay">
            <v-progress-circular
                indeterminate
                size="64"
            ></v-progress-circular>
        </v-overlay>

        <!-- log's table -->
        <mytable v-if="showTable" :data="aDataTable"/>

        <!-- Missing Logs (after filtering)-->
        <v-row v-if="showMissingLogsCard" class="missing_logs">
            <v-card>
                <v-row>
                    <v-col cols="2" class="d-flex justify-end align-center" >
                        <v-icon right x-large>fa-search</v-icon>
                    </v-col>
                    <v-col>  
                        <v-card-title>Missing Logs!</v-card-title> 
                        <v-card-subtitle>{{missingLogsMessage}}</v-card-subtitle>
                    </v-col>
                </v-row>
            </v-card>   
        </v-row>

        <!-- Show error in dialog -->
        <v-dialog
            v-model="dialogStatus"
            persistent
            max-width="290"
        >
            <v-card>
                <v-card-title class="headline">
                    {{dialogHeader}}
                </v-card-title>
                <v-card-text>{{dialogMessage}}</v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        link
                        color="warning" outlined 
                        @click="closeDialog"
                    >
                        Close
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    
    </div>

</template>

<script>

    import mytable from '../components/table.vue';
    import axios from '../services/axios';
    import datePicker from '../components/datePicker.vue';
    import screenSize from '../mixins/screenSize';

    export default {
        mixins:[screenSize],
        components:{
            datePicker,
            mytable
        },
        data(){
            return{
                overlay: false,
                aCountries:[],
                aUsers:[],
                filter:{
                    cnt_id:'',
                    usr_id:'',
                    date_from:'',
                    date_to:''
                },
                showTable: false,
                aDataTable: [],
                showMissingLogsCard: false,
                missingLogsMessage:'Please, Change your filters.',
                dialogStatus: false,
                dialogMessage:'Error has occurred while receiving data.',
                dialogHeader: 'Error!'
                
            }
        },
        methods: {
            closeDialog(){
                this.dialogStatus = false;
            },
            //Get updated date from datePicker component
            updateDateFrom(value){
                this.filter.date_from= value;
            },
            //Get updated date from datePicker component
            updateDateTo(value){
                this.filter.date_to = value;
            },
            //Get filtered logs
            getDataTable(){

                //required fields
                if (!this.isValidBtn){
                    return;
                }
                 //start progress-circular
                this.overlay = true;
                this.showMissingLogsCard = false;
                axios({
                    method: 'get',
                    url: `sendLog/getData.php`,
                    params:this.filter
                }).then(res => {
                     //stop progress-circular
                    this.overlay = false;
                    if(res.data.status == 'success'){
                        this.aDataTable = res.data.data;
                        if(this.aDataTable.length > 0){
                            this.showTable = true;
                        } else {
                            //show missing logs card
                            this.showMissingLogsCard = true;
                        }
                    }
                }).catch(err => {
                    this.overlay = false;
                    this.dialogStatus = true;
                    console.log(err);
                })
            },
            async getCountries(){
                axios({
                    method: 'get',
                    url: `countries/getCountries.php`,
                }).then(res => {
                    if(res.data.status == 'success'){
                         //generate text/value obj for select element
                        let temp = [];
                        res.data.data.forEach(el=>{
                            temp.push({text:el.cnt_title ,value:el.cnt_id})
                        });
                        this.aCountries = temp;
                    }
                    
                }).catch(err=>{
                    this.dialogStatus = true;
                    console.log(err);
                })
            },
            async getUsers(){
                axios({
                    method: 'get',
                    url: `users/getUsers.php`,
                }).then(res => {
                    if(res.data.status == 'success'){
                        //generate text/value obj for select element
                        let temp = [];
                        res.data.data.forEach(el=>{
                            temp.push({text:el.usr_name ,value:el.usr_id})
                        });
                        this.aUsers = temp;
                    }
                }).catch(err=>{
                    console.log(err);
                    this.dialogStatus = true;
                })
            },
            resetFilters(){
                this.showTable = false;
                this.aDataTable= [];
                //reset filter obj
                Object.keys(this.filter).forEach(el => {
                    this.filter[el] = '';
                });
            }
        },
        computed:{
            //disable or activate search btn
            isValidBtn(){
                let isValid = (this.filter.date_from && this.filter.date_to) 
                            && (this.filter.date_from < this.filter.date_to);

                return isValid ? true : false;
            }
        },
        async created() {
            //start progress-circular
            this.overlay = true;
            let countries = this.getCountries();
            let users = this.getUsers();
            // await for getting users and countries filter's data
            await Promise.all([countries, users]);
            //stop progress-circular
            this.overlay = false;
        },
    }
</script>

<style scoped>
    .logs_main {
        padding: 20px 200px;
    }
    .logs_main > * {
        margin-top:50px;
    }
    .container_md_screen{
        padding: 20px 100px;
    }
    .container_sm_screen{
        padding: 20px 50px;
    }
    .send_log_title{
        font-size: 2rem;
        font-weight: bold;
        line-height: 30px;
    }
    .filter{
        display: flex;
        border: 2px solid darkslateblue;
        align-items: center;
        background-color: white;
    }
    .filter > * {
        min-height: 70px;
    }
    .form-select{
        height: 70px;
        border: unset !important;
    }
    .filter_btn{
        font-size: 1.5rem;
        background-color: darkslateblue;
        color:white;
        height: 70px;
        border: 0;
        min-width:100%;
        font-weight: bold;
        line-height: 25px;
    }
    .missing_logs{
        margin-top:0;
    }

</style>