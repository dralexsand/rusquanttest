<template>
    <div class="container">
        <div class="row">
            <div class="col">
                Demo Form
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Your name"
                        name="name"
                        v-model="name"
                    >
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input
                        type="text"
                        class="form-control"
                        id="phone"
                        placeholder="Yor phone like a 89055095599"
                        name="phone"
                        v-model="phone"
                    >
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea
                        class="form-control"
                        placeholder="Your message"
                        id="message"
                        name="message"
                        style="height: 100px"
                        v-model="message"
                    >
                    </textarea>
                </div>
                <div class="mb-3">

                    Places:

                    <div
                        class="form-check"
                        v-for="place in places" :key="place.id"
                    >
                        <input
                            class="form-check-input"
                            type="radio"
                            name="storages"
                            :id="place.id"
                            @change="onChange($event)"
                            :value="place.storageplace"
                        >
                        <label
                            class="form-check-label"
                            :for="place.id">
                            {{ place.storageplace }}
                        </label>
                    </div>

                    <div v-if="showModal">
                        <transition name="modal">
                            <div class="modal-mask">
                                <div class="modal-wrapper">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button
                                                    type="button"
                                                    class="close"
                                                    @click="showModal=false">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label
                                                        for="newStorageplace"
                                                        class="form-label">
                                                        Add New Storageplace Form
                                                    </label>
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="newStorageplace"
                                                        placeholder="new storageplace"
                                                        v-model="newplace"
                                                    >
                                                </div>

                                                <div class="mb-3">
                                                    <button
                                                        id="addNewStorageplace"
                                                        class="btn btn-danger"
                                                        @click="insertStorageplace(newplace)">
                                                        Add New Storageplace
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <button
                        id="addStorageplace"
                        class="btn btn-danger"
                        @click="showModal=true">
                        Add storageplace
                    </button>

                </div>
                <div class="mb-3">
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="saveTicket()"
                    >
                        Save
                    </button>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            places: [],
            place: {
                id: '',
                storageplace: ''
            },
            showModal: false,
            newplace: '',
            storeitem: '',
            name: '',
            phone: '',
            message: '',
        }
    },
    props: {},
    mounted() {
        this.getStorageplaces()
    },
    methods: {
        async getStorageplaces() {
            await axios
                .get('http://rusquanttest.local/api/v1/storageplaces')
                .then(response => {
                    this.places = response.data
                    console.log(response.data)
                })
                .catch(error => {
                    console.log(error)
                })
                .finally();
        },
        async insertStorageplace(newplace) {
            this.showModal = false;
            console.log(newplace);
            /*const postData = {storageplace: newplace};
            await axios
                .post(
                    'http://rusquanttest.local/api/v1/storageplaces',
                    postData
                );
            this.getStorageplaces();*/
            this.newplace = '';
        },
        async saveTicket() {
            console.log(this.storeitem);
            console.log('name: ' + this.name);
            console.log('phone: ' + this.phone);
            console.log('message: ' + this.message);

            const postData = {
                storageplace: this.storeitem,
                name: this.name,
                phone: this.phone,
                message: this.message,
            };

            await axios
                .post(
                    'http://rusquanttest.local/api/v1/ticket',
                    postData
                );
        },
        onChange(event) {
            this.storeitem = event.target.value;
        }
    }
}
</script>

<style scope>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

</style>
