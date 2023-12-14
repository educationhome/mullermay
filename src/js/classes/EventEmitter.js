class EventEmitter {

    constructor() {
        this._events = new Map();
    }

    on(name, cb) {
        this._addEvent(name, cb);
    }

    off(name, cb) {
        this._removeCallback(name, cb);
    }

    emit(name, data = {}) {
        this._triggerEvent(name, data);
    }

    hasEvent(name) {
        return this._events.has(name);
    }


    _createEvent(name) {
        this._events.set(name, []);
    }


    _addEvent(name, cb) {
        if (typeof cb !== "function") {
            throw new Error(`Can't add callback to event (${name})! Callback is not a function.`);
        }

        if (!this.hasEvent(name)) {
            this._createEvent(name);
        }

        this._events.get(name).push({
            cb,
        });
    }

    _removeCallback(name, rmCb) {
        if (!this.hasEvent(name)) {
            return;
        }

        const filter = (entry) => entry.cb !== rmCb;
        const filteredEvents = this._events.get(name).filter(filter);

        this._events.set(name, filteredEvents);
    }

    _triggerEvent(name, data) {
        if (!this.hasEvent(name)) {
            return;
        }

        this._events.get(name).forEach((entry) => {
            entry.cb(data);
        });
    }
}

export default EventEmitter;