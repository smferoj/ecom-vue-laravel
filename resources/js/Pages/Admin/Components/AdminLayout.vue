<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
       
        
        <!-- Navbar -->
              <Navbar/>
        <!-- Endnavbar -->
   
              <Sidebar/>
        <!-- Sidebar -->

        <!-- EndSidebar -->

          <slot/>
       
       <!-- Footer -->

       
        
      </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Navbar from './Navbar.vue'
import Sidebar from './Sidebar.vue'
onMounted(() => {
    initFlowbite();
})


</script>