<template>
    <v-row class="nav">
        <h1 
            class="nav_title"
            :class="{'title_sm_screen': isSmallScreen, 'title_md_screen':isMdScreen}"
        >
            DarioHealth - Keeps your healthy!
        </h1>
    </v-row>
</template>

<script>
import screenSize from '../mixins/screenSize';

export default {
    //Detect screen size in order to change font size
    mixins:[screenSize]
}
</script>

<style scope>
    .nav{
        height: 150px !important;
        background-color:darkslateblue;
        color:white;
        align-items: center;
        padding-left:20px;
        max-height: 150px;
    }
    .nav_title{
        font-size: 3rem;
        font-weight: bold;
        text-align: center;
    }
    .title_sm_screen{
        font-size: 1.2rem;
    }
    .title_md_screen{
        font-size: 2.7rem;
    }

</style>