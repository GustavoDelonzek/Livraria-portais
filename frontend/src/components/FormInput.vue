<template>
  <div class="relative z-0 w-full mb-6 group">
    <input
      :type="type"
      :name="name"
      class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer placeholder-transparent"
      :placeholder="placeholder"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      required
    />
    <label
      class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-6 scale-75 top-3 left-0 origin-[0] transition-all duration-200 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
    >
      {{ label }}
    </label>
  </div>
</template>

<script>
export default {
  name: 'FormInput',
  props: {
    type: { type: String, default: 'text' },
    name: { type: String, required: true },
    label: { type: String, required: true },
    placeholder: { type: String, default: ' ' },
    modelValue: { type: [String, Number], required: true }
  },
  emits: ['update:modelValue']
}
</script>

<style scoped>
/* Make sure input fields have smooth transitions */
input:focus {
  outline: none;
  border-color: #3b82f6; /* Tailwind blue-500 */
}

input:focus + label,
input:not(:placeholder-shown) + label {
  color: #3b82f6;
}
</style>
