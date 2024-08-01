export default class QueryParameters {
    params;

    constructor() {
        this.params = new URLSearchParams(location.search);
    }

    integerValue(name) {
        return this.params.get(name) ? parseInt(this.params.get(name)) : null;
    }

    stringValue(name) {
        return this.params.get(name) ? this.params.get(name) : null;
    }
}
