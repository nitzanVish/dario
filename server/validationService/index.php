<?php

class ValidationService
{
    //Check if date is valid
    public static function validDate($date)
    {
        $newDate = DateTime::createFromFormat('Y-m-d', $date);
        return $newDate && ($newDate->format('Y-m-d') === $date);
    }
    //Check if value  is num
    public static function validNumber($number)
    {
        return  is_numeric($number) ? $number : false;
    }
    //Check if value exist
    public static function requiredValue($value)
    {
        return empty($value) ? false : $value;
    }

}


// <div class="main">
// <h3 class="send_log_title"> Sent Logs</h3>
// <div class="row filter">
//     <div class="col-4">
//         <div class="row">
//             <div class="col">
//                 <v-menu
//                     ref="menu"
//                     v-model="menu"
//                     :close-on-content-click="false"
//                     :return-value.sync="date"
//                     transition="scale-transition"
//                     offset-y
//                     min-width="auto"
//                 >
//                 <template v-slot:activator="{ on, attrs }">
//                     <v-text-field
//                         v-model="date"
//                         label="Start Date"
//                         prepend-icon="mdi-calendar"
//                         readonly
//                         v-bind="attrs"
//                         v-on="on"
//                     ></v-text-field>
//                 </template>
//                 <v-date-picker
//                     v-model="date"
//                     no-title
//                     scrollable
//                 >
//                     <v-spacer></v-spacer>
//                     <v-btn
//                         text
//                         color="primary"
//                         @click="menu = false"
//                     >
//                         Cancel
//                     </v-btn>
//                     <v-btn
//                         text
//                         color="primary"
//                         @click="$refs.menu.save(date)"
//                     >
//                         OK
//                     </v-btn>
//                 </v-date-picker>
//                 </v-menu>
//             </div>
//             <div class="col">
                
//                 <v-menu
//                     ref="menu"
//                     v-model="menu"
//                     :close-on-content-click="false"
//                     :return-value.sync="date"
//                     transition="scale-transition"
//                     offset-y
//                     min-width="auto"
//                 >
//                 <template v-slot:activator="{ on, attrs }">
//                     <v-text-field
//                         v-model="date"
//                         label="End Date"
//                         prepend-icon="mdi-calendar"
//                         readonly
//                         v-bind="attrs"
//                         v-on="on"
//                     ></v-text-field>
//                 </template>
//                 <v-date-picker
//                     v-model="date"
//                     no-title
//                     scrollable
//                 >
//                     <v-spacer></v-spacer>
//                     <v-btn
//                         text
//                         color="primary"
//                         @click="menu = false"
//                     >
//                         Cancel
//                     </v-btn>
//                     <v-btn
//                         text
//                         color="primary"
//                         @click="$refs.menu.save(date)"
//                     >
//                         OK
//                     </v-btn>
//                 </v-date-picker>
//                 </v-menu>
//             </div>
//         </div>
//     </div>

//     <!-- User Filter -->
//     <div class="col-3">
//         <select 
//             class="form-select" 
//             aria-label="select country"
//             v-model="filter.usr_id"
//             aria-placeholder="Choose User"
//             placeholder="Choose User"
//         >
//             <option 
//                 :value="user.usr_id" 
//                 v-for="user in aUsers" 
//                 :key="user.usr_id"
//             >
//                 {{user.usr_name}}
//             </option>
//         </select>
//     </div>

//     <!-- Country Filter -->
//     <div class="col-3">
//         <select 
//             class="form-select" 
//             aria-label="Choose Country"
//             v-model="filter.cnt_id"
//         >
//         <option selected value="0">Choose Country</option>
//             <option 
//                 :value="country.cnt_id" 
//                 v-for="country in aCountries" 
//                 :key="country.cnt_id"
//             >
//                 {{country.cnt_title}}
//             </option>
//         </select>
            
//     </div>

//     <div class="col-2">
//         <button class="filter_btn">Search</button>
//     </div>
// </div>
// </div>