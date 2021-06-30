<template>
<!-- table -->
    <v-row>
        <v-simple-table>
            <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">
                        Date
                    </th>
                    <th class="text-left">
                        Successfully sent
                    </th>
                    <th class="text-left">
                        Failed
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(item, index) in data"
                    :key="index"
                >
                    <td>{{ item.date }}</td>
                    <td>{{ item.log_success_amount }}</td>
                    <td>{{ item.log_failed_amount }}</td>
                </tr>
            </tbody>
            </template>
        </v-simple-table>
    </v-row>

</template>

<script>
export default {
    props:{
        data:{
            require:true,
            type:Array
        }
    }
}
</script>