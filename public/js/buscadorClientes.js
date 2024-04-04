$(".search-client").select2({
    placeholder: 'Seleccione un cliente',
    ajax: {
        url: 'admin/findClients',
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term
            };
        },
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        id: item.id,
                        text: item.name + ' ' + item.last_name + ' ' + item.dni
                    };
                })
            };
        },
        cache: true
    }
})