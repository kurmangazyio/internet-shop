import { defineComponent } from "vue"

const Example = defineComponent({
    name: "ExampleComponent",
    props: {
        message: {
            type: String,
            required: true,
        }
    },
    setup (props) {
        return () => (
            <div> {props.message} </div>
        )
    }
})

export default Example
