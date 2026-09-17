<?php

namespace App\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class MasterHeadWidget extends Widget_Base
{
    public function get_name(): string {
        return "masterhead";
    }
        
    public function get_title(): string {
        return 'MasterHead';
    }
        
    public function get_icon(): string {
        return 'eicon-featured-image';
    }

    public function get_keywords(): array {
        return ['bracelet', 'ecommerce', 'masterheader', 'header'];
    }

    public function get_categories(): array {
        return ['bracelet-elements'];
    }

    protected function register_controls(): void {
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__('Title', 'sage'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'header_title',
            [
                'label'   => esc_html__('Header Title', 'sage'),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__('We are citizens of the world', 'sage'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'desktop_section',
            [
                'label' => esc_html__('Desktop View', 'sage'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'desktop_video',
            [
                'label'       => esc_html__('Desktop Video', 'sage'),
                'type'        => Controls_Manager::MEDIA,
                'media_types' => ['video'],
            ]
        );

        $this->add_control(
            'desktop_thumbnail',
            [
                'label'       => esc_html__('Desktop Thumbnail', 'sage'),
                'type'        => Controls_Manager::MEDIA,
                'media_types' => ['image'],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_section',
            [
                'label' => esc_html__('Mobile Section', 'sage'),
                'tab'   => Controls_Manager::TAB_CONTENT, 
            ]
        );

        $this->add_control(
            'mobile_video',
            [
                'label'       => esc_html__('Mobile Video', 'sage'),
                'type'        => Controls_Manager::MEDIA,
                'media_types' => ['video'],   
            ]
        );

        $this->add_control(
            'mobile_thumbnail',
            [
                'label'       => esc_html__('Mobile Thumbnail', 'sage'),
                'type'        => Controls_Manager::MEDIA,
                'media_types' => ['image'],
            ]           
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();

        echo view('sections.masterhead', [
            'header_title'      => $settings['header_title'] ?? '',
            'desktop_video'     => $settings['desktop_video'] ?? null,
            'desktop_thumbnail' => $settings['desktop_thumbnail'] ?? null,
            'mobile_video'      => $settings['mobile_video'] ?? null,
            'mobile_thumbnail'  => $settings['mobile_thumbnail'] ?? null,
        ])->render();
    }
}