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
                    >
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea
                        class="form-control"
                        placeholder="Your message"
                        id="message"
                        name="message"
                        style="height: 100px">
                    </textarea>
                </div>
                <div class="mb-3">
                    <select
                        id="storageplace"
                        name="storageplace"
                        class="form-select"
                        aria-label="Default select example">
                        <option selected>Choose place for storage</option>
                        <option value="mysql">Database MySql</option>
                        <option value="mysql2">Database MySql 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button
                        type="button"
                        class="btn btn-primary">
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
    mounted() {
        console.log('MainForm mounted')
    }
}
</script>
