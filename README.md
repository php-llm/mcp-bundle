# MCP Bundle [WIP]

Symfony integration bundle for [Model Context Protocol](https://modelcontextprotocol.io/) using the unofficial
PHP SDK [php-llm/mcp-sdk](https://github.com/php-llm/mcp-sdk) library.

**Currently only supports tools as server via Server-Sent Events (SSE) and STDIO.**

## Installation

```bash
composer require php-llm/mcp-bundle
```

## Usage

At first, you need to decide whether your application should act as a MCP server or client. Both can be configured
in the `mcp` section of your `config/packages/mcp.yaml` file.

### Act as Server

**Currently only supports tools.**

To use your application as an MCP server, exposing tools to clients like [Claude Desktop](https://claude.ai/download),
you need to configure in the `client_transports` section the transports you want to expose to clients.
You can use either STDIO or SSE.

### Act as Client

**Not implemented yet.**

To use your application as an MCP client, integrating other MCP servers, you need to configure the `servers` you want to
connect to. You can use either  STDIO or Server-Sent Events (SSE) as transport methods.

You can find a list of example Servers in the [MCP Server List](https://modelcontextprotocol.io/examples).

Tools of those servers are available in your [LLM Chain Bundle](https://github.com/php-llm/llm-chain-bundle)
configuration and usable in your chains.

## Configuration

```yaml
mcp:
    app: 'app' # Application name to be exposed to clients
    version: '1.0.0' # Application version to be exposed to clients

    # Configure this application to act as an MCP server
    # Currently exposes tools registered in LLM Chain
    client_transports:
        stdio: true # Enable STDIO via command
        sse: true # Enable Server-Sent Event via controller
    
    # Configure MCP servers to be used by this application
    # Not implemented yet
    servers:
        name:
            transport: 'stdio' # Transport method to use, either 'stdio' or 'sse'
            stdio:
                command: 'php /path/bin/console mcp' # Command to execute to start the client
                arguments: [] # Arguments to pass to the command
            sse:
                url: 'http://localhost:8000/sse' # URL to SSE endpoint of MCP server

```
