$(document).ready(() => {
    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal'));

    function reloadTable() {
        window.LaravelDataTables['article-table'].draw(false);
    }

    function resetForm() {
        $('#article-form').trigger('reset');
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('input[name="title"]').val(data.title).trigger('change');
        form.find('textarea[name="summary"]').val(data.summary);
    }

    function generateDetailHTML(json) {
        const formatDate = (date) =>
            new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(date));

        const upperCase = (string) => string.toUpperCase();

        const fields = [
            { label: 'Title', value: json.title },
            { label: 'Summary', value: json.summary },
            {
                label: 'Image',
                value: `<img src="${window.location.origin}/storage/${json.image}" class="img-fluid">`
            },
        ];

        return fields
            .map(field => `
                <div class="col-md-12">
                    <div class="form-group row mb-3">
                        <label class="form-label text-start col-md-12">${field.label}:</label>
                        <div class="col-md-12">
                            <p>${field.value}</p>
                        </div>
                    </div>
                </div>
            `)
            .join('');
    }

    function onCreated() {
        modalInstance.hide();
        reloadTable();
    }

    $('#article-form').submit((e) => e.preventDefault());

    $(document).on('hide.bs.modal', (event) => {
        if (document.activeElement) document.activeElement.blur();
    });

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#article-form', onCreated);
    };

    window.onDetail = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#modal-detail h5#modal-title').text('Detail ' + json.title);
            $('#add-detail-content').html(generateDetailHTML(json));
        } else {
            console.warn('Data JSON not found');
        }
    };

    window.onStore = function (event) {
        resetForm();
        $('#article-form h5#modal-title').text('Add New Article');

        $('#article-form')
            .attr('action', route('articles.store'))
            .attr('method', 'POST');
    };

    window.onEdit = function (event) {
        resetForm();
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#article-form h5#modal-title').text('Edit ' + json.title);

            populateFormFields('#article-form', json);

            $('#article-form')
                .attr('action', route('articles.update', json.id))
                .attr('method', 'PUT');
        } else {
            console.warn('Data JSON not found');
        }
    };

    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('articles.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON not found');
        }
    };
});
