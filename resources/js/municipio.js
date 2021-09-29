// import axios from "axios"

const app = new Vue ({
    el: '#app',
    data: {
        selected_estado: '',
        selected_municipio: '',
        municipios:[],
    },
    methods: {
        loadMuni() {
            axios.get('municipios', {params: {estado_id: this.selected_estado} }).then ((response) => {
                this.municipios = response.data;
            });
        }
    }
});