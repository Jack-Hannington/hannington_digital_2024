const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck, InnerBlocks } = wp.blockEditor;
const { Button } = wp.components;

registerBlockType('mytheme/cover', {
    title: 'Responsive Cover',
    icon: 'format-image',
    category: 'layout',
    attributes: {
        desktopId: {
            type: 'number',
        },
        desktopUrl: {
            type: 'string',
        },
        mobileId: {
            type: 'number',
        },
        mobileUrl: {
            type: 'string',
        },
    },
    edit({ attributes, setAttributes }) {
        const { desktopId, desktopUrl, mobileId, mobileUrl } = attributes;

        return (
            <div className={`cover-desktop-${desktopId} cover-mobile-${mobileId}`}>
                <MediaUploadCheck>
                    <MediaUpload
                        onSelect={media => setAttributes({ desktopId: media.id, desktopUrl: media.url })}
                        allowedTypes={['image']}
                        value={desktopId}
                        render={({ open }) => (
                            <Button onClick={open}>
                                {desktopId ? 'Change Desktop Image' : 'Choose Desktop Image'}
                            </Button>
                        )}
                    />
                    <MediaUpload
                        onSelect={media => setAttributes({ mobileId: media.id, mobileUrl: media.url })}
                        allowedTypes={['image']}
                        value={mobileId}
                        render={({ open }) => (
                            <Button onClick={open}>
                                {mobileId ? 'Change Mobile Image' : 'Choose Mobile Image'}
                            </Button>
                        )}
                    />
                </MediaUploadCheck>
                <InnerBlocks />
            </div>
        );
    },
    save({ attributes }) {
        const { desktopId, mobileId } = attributes;

        return (
            <div className={`cover-desktop-${desktopId} cover-mobile-${mobileId}`}>
                <InnerBlocks.Content />
            </div>
        );
    },
});
