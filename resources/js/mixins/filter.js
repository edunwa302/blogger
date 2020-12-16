export default {
    filters: {
        // Create our number formatter.
        priceFormated: value => {
            if (!value) return ''
            let formatter = new Intl.NumberFormat('en-NG', {
                style: 'currency',
                currency: 'NGN',
            });
            return formatter.format(value)
        },
        //  capitalize
        capitalize(value) {
            if (!value) return ''
            value = value.toString()
            return value.charAt(0).toUpperCase() + value.slice(1)
        },
        // timestamp
        timestamp(value) {
            // getting data (timestamp) from cloud firestore
            if (!value) return ''
            let date = value.toDate();
            return date.toDateString();
            let shortTime = date.toLocaleTimeString();
        },
        phoneNumber(value) {
            if (!value) return ''
            let str = +234;
            return value.replace(str, 0)
        }
    },
}