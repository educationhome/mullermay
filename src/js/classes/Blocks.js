import EventEmitter from "./EventEmitter";




class Blocks extends EventEmitter {

    constructor($root) {
        super();


        this.$root = $root;


        this.blocks = [];
        this.blocksBlueprints = [];


        this.onUpdateLazyLoad = this.onUpdateLazyLoad.bind(this);

        this.registerBlock("info-block", InfoBlock);
        this.registerBlock("slider", Slider);
        this.registerBlock("home-services-list", HomeServicesList);
        this.registerBlock("info_block_small", InfoBlockSmall);

    }



    // Lifetime functions.

    mount() {
        this.setBlocks();
    }



    // Helper.

    registerBlock(id, blockClass) {
        this.blocksBlueprints.push({
            id: id,
            blockClass: blockClass,
            targets: [],
        });
    }

    addBlock(instance, type, target) {
        this.blocks.push({
            instance: instance,
            type: type,
            target: target,
        });
    }

    updateBlocks() {
        this.setBlocks();
    }

    setBlocks() {
        this.blocksBlueprints.forEach((blueprint) => {
            const $targets = Array.from(this.$root.querySelectorAll(`[data-block-${blueprint.id}]`));

            $targets.forEach(($target) => {
                const foundBlock = this.blocks.find((block) => block.target === $target);

                if (foundBlock) {
                    return;
                }

                const block = new blueprint.blockClass($target);

                this.addBlock(block, blueprint.id, $target);
            });
        });
    }



    // Event callbacks.

    onResize(event) {
        this.blocks.forEach((block) => {
            if (block.instance.onResize) {
                block.instance.onResize(event);
            }
        });
    }

    onTouchMove(event) {
        this.blocks.forEach((block) => {
            if (block.instance.onTouchMove) {
                block.instance.onTouchMove(event);
            }
        });
    }

    onTouchEnd(event) {
        this.blocks.forEach((block) => {
            if (block.instance.onTouchEnd) {
                block.instance.onTouchEnd(event);
            }
        });
    }

    onUpdateLazyLoad() {
        this.blocks.forEach((block) => {
            if (!block.instance.onUpdateLazyLoad) {
                return true;
            }

            block.instance.onUpdateLazyLoad();
        })
    }
}

export default Blocks;