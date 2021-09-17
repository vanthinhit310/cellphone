<script>
export default {
    methods: {
        showConfirmBox(option) {
            const self = this;
            self.$swal({
                title: option.title || 'Are you sure?',
                text: option.text || "You won't be able to revert this!",
                icon: option.icon || 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: option.confirmText || 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    option.method(option.event ? option.event : true);
                }
            });
        },
    },
};
</script>
