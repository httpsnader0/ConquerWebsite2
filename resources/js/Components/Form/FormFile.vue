<template>

	<div>

		<Label
			:form="form"
			:name="name"
			:label="label"
			:required="required"
		/>

		<div class="w-full flex gap-3 justify-center items-stretch">

			<FileUpload
				mode="basic"
				:auto="true"
				:customUpload="true"
				:accept="accept"
				:chooseLabel="chooseLabel"
				@select="handleSelectFile"
				:pt="{
					root: { class: 'w-[calc(100%-8.75rem)]' },
					input: { id: name },
					chooseButton: { class: 'upload-btn' },
				}"
			/>

			<template v-if="!isFile">

				<FilePreview
					:src="filePreview ?? asset('uploadable.jpg')"
					class="w-32 h-32"
					:isBlack="isBlack"
				/>

			</template>

			<template v-else>

				<PDFPreview
					v-if="removePDF"
					:filePreview="filePreview"
				/>

			</template>

		</div>

		<Error
			:form="form"
			:name="name"
			:hasRepeated="hasRepeated"
			:field="field"
			:index="index"
		/>

	</div>

</template>

<script setup>

	import FileUpload from "primevue/fileupload";
	import FilePreview from "@/Components/Avatar/FilePreview.vue";
	import PDFPreview from "@/Components/Avatar/PDFPreview.vue";
	import Label from "./Label.vue";
	import Error from "./Error.vue";
	import { ref } from "vue";
	import { useI18n } from "vue-i18n";

	const i18n = useI18n(), props = defineProps({
		label: String,
		form: Object,
		name: String,
		required: Boolean,
		hideLabel: Boolean,
		src: String,
		isFile: Boolean,
		accept: {
			type: String,
			default: "image/*",
		},
		removePDF: {
			type: Boolean,
			default: true,
		},
		isBlack: {
			type: Boolean,
			default: false,
		},
		hasRepeated: {
			type: Boolean,
			default: false,
		},
		field: {
			type: String,
			default: '',
		},
		index: {
			type: Number,
			default: 0,
		},
	}), chooseLabel = ref(i18n.t('Choose File')), filePreview = ref(props.src), handleSelectFile = (e) => {
		const file = e.files[0];
		chooseLabel.value = file.name;
		filePreview.value = file.objectURL;
		if (props.hasRepeated) {
			props.form[props.field][props.index][props.name] = file;
		} else {
			props.form[props.name] = file;
		}
	};

</script>
