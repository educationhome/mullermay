import EventEmitter from "./EventEmitter";
import {bind} from "../utils/helper";



class VideoManager extends EventEmitter {

    constructor($video) {
        super();

        this.isMounted = false;

        if (!$video) {
            return;
        }

        bind(
            this,
            "onVideoEnded",
        );

        this.$video = $video;

        this.mount();
    }



    // Lifetime functions.

    mount() {
        if (this.isMounted) {
            return;
        }
        this.isMounted = true;

        this.addEvents();

        this.loadVideo();
    }

    unmount() {
        if (!this.isMounted) {
            return;
        }
        this.isMounted = false;

        this.$video.autoplay = false;
        this.$video.pause();

        this.removeEvents();
    }

    addEvents() {
        this.$video.addEventListener("ended", this.onVideoEnded);
    }

    removeEvents() {
        this.$video.removeEventListener("ended", this.onVideoEnded);
    }



    // Helper.

    async playVideo(reset = false) {
        if (!this.isMounted) {
            return;
        }

        if (!this.isVideoLoaded) {
            await new Promise((resolve) => {
                this.loadVideo();

                const taskId = setInterval(() => {
                    if (!this.isVideoLoaded) {
                        return;
                    }

                    clearInterval(taskId);

                    resolve();
                }, 100);
            });
        }

        if (reset) {
            this.$video.currentTime = 0;
        }
        this.$video.play();

        return Promise.resolve();
    }

    async loadVideo() {
        if (!this.isMounted) {
            return;
        }

        if (this.isVideoLoaded || this.isVideoLoading) {
            return Promise.resolve();
        }

        this.isVideoLoading = true;

        await new Promise((resolve) => {
            this.$video.addEventListener("loadeddata", () => {
                console.log("videomanager trigger loaded");
                this.$video.classList.add("loaded");
                resolve();
            });

            this.$video.addEventListener("error", () => {
                console.log("videomanager trigger error");
                resolve();
            });

            this.$video.src = this.$video.src;

            console.log("videomanager trigger load");
            this.$video.src = this.$video.dataset.src;
        });

        console.log("loadedVideo", this.$video);
        this.emit("video-loaded", null);

        this.isVideoLoading = false;
        this.isVideoLoaded = true;

        return Promise.resolve();
    }



    // Event callbacks.

    onVideoEnded(event) {
        console.log("emit ended");
        this.emit("video-ended", {event});
    }
}

export default VideoManager;