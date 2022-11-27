<template>
    <div>
        Vite Vue Laravel
        <br />
        {{ message }}

        <example-component
            :message="message"
        />
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import ExampleComponent from './views/shared/Example.tsx'

export default defineComponent({
    components: {
        ExampleComponent
    },
    setup() {
        const message = ref<string>('Hello World')
        return {
            message
        }
    },
})
</script>
