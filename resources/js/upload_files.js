  var myDropzone1 = new Dropzone("#mDropzoneProductImages", {
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 5,
        maxFilesize: 10000,
        addRemoveLinks: true,
        accept: function (e, o) {
            vm.images.push(e);
            "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
        },
        removedfile: function (file) {
            vm.images.splice(vm.images.indexOf(file), 1);
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        },
        success: function (file, response) {

            // vm.files.push(file);
        },
    });


var vm = new Vue({
    el: '#app',
    data: {

       
       images: [],
    
    },


    created: function () {

    },

   
    methods: {

    uploadFile: function () { 
		var formData = new FormData();
		this.images.forEach(function (value, index) {
                formData.append('images[' + index + ']', value);
        });
		axios.post("{{url('')}}" + "/testvueupload" , formData )
		.then(function (res) {
		console.log(res.data);
		})
		.catch(function (err) {
		}); }

    
    },
    watch: {}
});
